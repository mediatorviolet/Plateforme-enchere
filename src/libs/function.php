<?php
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

function validationForm($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    echo $data . "\n";
}
?>