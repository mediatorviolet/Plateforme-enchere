<?php
require_once 'data.php';
$nomProduit = $inputPrixLancement = $inputDuree = $inputPrixClic = $inputAugmentationPrix = $inputAugmentationDuree = "";
$nomProduitErr = $inputPrixLancementErr = $inputDureeErr = $inputPrixClicErr = $inputAugmentationPrixErr = $inputAugmentationDureeErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nomProduit"])) {
        $nomProduitErr = "Veuillez entrer un nom pour votre produit.";
    } else {
        $nomProduit = validationForm($_POST["nomProduit"]);
    }
    if(empty($_POST["inputPrixLancement"])) {
        $inputPrixLancementErr = "Veuillez entrer un prix de lancement.";
    } else {
        $inputPrixLancement = validationForm($_POST["inputPrixLancement"]);
    }
    if(empty($_POST["inputDuree"])) {
        $inputDureeErr = "Veuillez entrer une durée.";
    } else {
        $inputDuree = validationForm($_POST["inputDuree"]);
    }
    if(empty($_POST["inputPrixClic"])) {
        $inputPrixClicErr = "Veuillez entrer le prix du clic.";
    } else {
        $inputPrixClic = validationForm($_POST["inputPrixClic"]);
    }
    if(empty($_POST["inputAugmentationPrix"])) {
        $inputAugmentationPrixErr = "Veuillez entrer une valeur pour l'augmentation du prix par clic.";
    } else {
        $inputAugmentationPrix = validationForm($_POST["inputAugmentationPrix"]);
    }
    if(empty($_POST["inputAugmentationDuree"])) {
        $inputAugmentationDureeErr = "Veuillez entrer une valeur pour l'augmentation de la durée de l'enchère par clic.";
    } else {
        $inputAugmentationDuree = validationForm($_POST["inputAugmentationDuree"]);
    }
}

function validationForm() {
    $required_input = ["nomProduit", "inputPrixLancement", "inputDuree", "inputPrixClic", "inputAugmentationPrix", "inputAugmentationDuree"];
    foreach ($required_input as $input) {
        if (empty($_POST["$input"])) {
            $form_validation = false;
        } else {
            $form_validation = true;

            $_POST["$input"] = trim($_POST["$input"]);
            $_POST["$input"] = stripslashes($_POST["$input"]);
            $_POST["$input"] = htmlspecialchars($_POST["$input"]);
        }
        //echo $_POST["$input"] . "<br>";
    }
    if ($form_validation == false) {
        echo "<div class=\"col-6 d-flex justify-content-center\">    
        <div class=\"alert alert-danger\">Veuillez remplir tous les champs demandés.</div></div>";
    } else {
        echo "<div class=\"col-6 d-flex justify-content-center\">    
        <div class=\"alert alert-success\">Article ajouté avec succès.</div></div>";
    
        // Création d'un id unique pour chaque article
        $id_enchere = "article_" . md5(uniqid(rand(), true));
        $_POST['id'] = $id_enchere;
        
        // Création d'un nouvel objet dans la classe Articles
        $data_file = 'src/libs/data.php';
        $text = "<?php " . $_POST["id"] . " = new Articles(\"" . $_POST["nomProduit"] . "\", \"src/resources/img/uploads/" 
        . htmlspecialchars(basename($_FILES["inputUploadImg"]["name"])) . "\", " . $_POST["inputPrixLancement"] . ", " 
        . $_POST["inputDuree"] . ", " . $_POST["inputPrixClic"] . ", " . $_POST["inputAugmentationPrix"] . ", " 
        . $_POST["inputAugmentationDuree"] . ")" . "; ?>";
        file_put_contents($data_file, $text, FILE_APPEND);
    }
}
?>