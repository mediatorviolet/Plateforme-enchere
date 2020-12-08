<?php
require_once 'upload.php';
$nomProduitErr = $inputPrixLancementErr = $inputDureeErr = $inputPrixClicErr = $inputAugmentationPrixErr = $inputAugmentationDureeErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nomProduit"])) {
        $nomProduitErr = "Veuillez entrer un nom pour votre produit.";
    }
    if (empty($_POST["inputPrixLancement"])) {
        $inputPrixLancementErr = "Veuillez entrer un prix de lancement.";
    }
    if (empty($_POST["inputDuree"])) {
        $inputDureeErr = "Veuillez entrer une durée.";
    }
    if (empty($_POST["inputPrixClic"])) {
        $inputPrixClicErr = "Veuillez entrer le prix du clic.";
    }
    if (empty($_POST["inputAugmentationPrix"])) {
        $inputAugmentationPrixErr = "Veuillez entrer une valeur pour l'augmentation du prix par clic.";
    }
    if (empty($_POST["inputAugmentationDuree"])) {
        $inputAugmentationDureeErr = "Veuillez entrer une valeur pour l'augmentation de la durée de l'enchère par clic.";
    }
}


$class_alert = "";
$msg_alert = "";
function validationForm()
{
    global $class_alert;
    global $msg_alert;
    $count = 0;
    $required_input = ["nomProduit", "inputPrixLancement", "inputDuree", "inputPrixClic", "inputAugmentationPrix", "inputAugmentationDuree"];
    foreach ($required_input as $input) {
        if (empty($_POST["$input"])) {
            $count++;
        } else {
            $_POST["$input"] = trim($_POST["$input"]);
            $_POST["$input"] = stripslashes($_POST["$input"]);
            $_POST["$input"] = htmlspecialchars($_POST["$input"]);
        }
    }
    if ($count > 0) {
        $class_alert = "danger";
        $msg_alert = "Veuillez remplir tous les champs demandés.";
    } else {
        $class_alert = "success";
        $msg_alert = "Article ajouté avec succès.";
        ajout_produit();
    }
}


function ajout_produit()
{
    // Création d'un id unique pour chaque article
    $id_enchere = "article_" . md5(uniqid(rand(), true));
    $_POST["id"] = $id_enchere;

    // Ajout du de l'article dans le tableau $json_array
    $postArray = array(
        "id" => $id_enchere,
        "titre" => $_POST["nomProduit"],
        "image" => "src/resources/img/uploads/" . basename($_FILES["inputUploadImg"]["name"]),
        "prixLancement" => intval($_POST["inputPrixLancement"]),
        "duree" => intval($_POST["inputDuree"] * 3600),
        "prixClic" => intval($_POST["inputPrixClic"]),
        "augmentationPrix" => intval($_POST["inputAugmentationPrix"]),
        "augmentationDuree" => intval($_POST["inputAugmentationDuree"]),
        "etat" => "inactif",
        "date_fin" => mktime(date("H") + ($_POST["inputDuree"]))
    );

    $data_file = 'src/libs/data.json';
    $json_array = json_decode(file_get_contents($data_file), true);
    array_unshift($json_array, $postArray);
    file_put_contents($data_file, json_encode($json_array));
}

function enchere()
{
    global $data_file;
    global $json_array;
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["encherir"])) {
        $id = $_POST["hint"];
        $json_array = json_decode(file_get_contents($data_file), true);
        (int) $json_array[$id]["prixLancement"] += (int) $json_array[$id]["augmentationPrix"] * 0.01 / count($json_array); // Division par la longueur de $json_array (bug foreach ?)
        (int) $json_array[$id]["date_fin"] += (int) $json_array[$id]["augmentationDuree"] / count($json_array); // Division par la longueur de $json_array (bug foreach ?)
        file_put_contents($data_file, json_encode($json_array));
        header("Location:  index.php#" . $json_array[$id]["id"]);
    }
}

function change_state() {
    global $data_file;
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["state"])) {
        $id = $_POST["indice"];
        $json_array = json_decode(file_get_contents($data_file), true);
        if ($json_array[$id]["etat"] == "actif") {
            $json_array[$id]["etat"] = "inactif";
            file_put_contents($data_file, json_encode($json_array));
            header("Location:  admin.php?page=dashboard#" . $json_array[$id]["id"]);
        } else if ($json_array[$id]["etat"] == "inactif") {
            $json_array[$id]["etat"] = "actif";
            file_put_contents($data_file, json_encode($json_array));
            header("Location:  admin.php?page=dashboard#" . $json_array[$id]["id"]);
        }
    }
}
?>