<?php
    $nom_maj_err = $prix_maj_err = $duree_maj_err = $prixClic_maj_err = $augmentationPrix_maj_err = $augmentationDuree_maj = "";
    $required_input = ["nom_maj", "prix_maj", "duree_maj", "prixClic_maj", "augmentationPrix_maj", "augmentationDuree_maj"];
    $class_alert = "";
    $msg_alert = "";

    function validation_modif() {
        global $required_input;
        global $class_alert;
        global $msg_alert;
        $count = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["modifier"])) {
            if (empty($_POST["nom_maj"])) {
                $nom_maj_err = "Veuillez entrer un nom pour votre produit.";
            }
            if (empty($_POST["prix_maj"])) {
                $prix_maj_err = "Veuillez entrer un prix de lancement.";
            }
            if (empty($_POST["duree_maj"])) {
                $duree_maj_err = "Veuillez entrer une durée.";
            }
            if (empty($_POST["prixClic_maj"])) {
                $prixClic_maj_err = "Veuillez entrer le prix du clic.";
            }
            if (empty($_POST["augmentationPrix_maj"])) {
                $augmentationPrix_maj_err = "Veuillez entrer une valeur pour l'augmentation du prix par clic.";
            }
            if (empty($_POST["augmentationDuree_maj"])) {
                $augmentationDuree_maj = "Veuillez entrer une valeur pour l'augmentation de la durée de l'enchère par clic.";
            }
            foreach ($required_input as $input) {
                if (empty($_POST[$input])) {
                    $count ++;
                } else {
                    $_POST[$input] = trim($_POST[$input]);
                    $_POST[$input] = stripslashes($_POST[$input]);
                    $_POST[$input] = htmlspecialchars($_POST[$input]);
                }
            }
            if ($count > 0) {
                $class_alert = "danger";
                $msg_alert = "Veuillez remplir tous les champs demandés.";
            } else {
                $class_alert = "success";
                $msg_alert = "Article ajouté avec succès.";
                modif_enchere();
            }
        }
    }
    
    function modif_enchere() {
        $json_array = json_decode(file_get_contents("src/libs/data.json"), true);
        $id = $_POST["id"];
        
        $json_array[$id]["titre"] = $_POST["nom_maj"];
        $json_array[$id]["prixLancement"] = (int) $_POST["prix_maj"];
        $json_array[$id]["duree"] = (int) $_POST["duree_maj"];
        $json_array[$id]["prixClic"] = (int) $_POST["prixClic_maj"];
        $json_array[$id]["augmentationPrix"] = (int) $_POST["augmentationPrix_maj"];
        $json_array[$id]["augmentationDuree"] = (int) $_POST["augmentationDuree_maj"];
        
        file_put_contents("src/libs/data.json", json_encode($json_array));
        header("Location: admin.php?page=formModif");
    }
    
    function img_upload() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["modifier"])) {
            $json_array = json_decode(file_get_contents("src/libs/data.json"), true);
            $id = $_POST["id"];
            $json_array[$id]["image"] = "src/resources/img/uploads/" . basename($_FILES["inputUploadImg"]["name"]);
            file_put_contents("src/libs/data.json", json_encode($json_array));
        }    
    }
?>