<?php
    $required_input = ["nom_maj", "prix_maj", "duree_maj", "prixClic_maj", "augmentationPrix_maj", "augmentationDuree_maj"];
    $class_alert = "";
    $msg_alert = "";
    function validation_modif() {
        global $required_input;
        global $class_alert;
        global $msg_alert;
        $count = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["modifier"])) {
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
        header("Location: admin.php?page=dashboard");
    }
?>