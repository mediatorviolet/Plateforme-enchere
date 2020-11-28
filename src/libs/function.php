<?php
$nomProduit = $inputPrixLancement = $inputDuree = $inputAugmentationPrix = $inputAugmentationDuree = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomProduit = validationForm($_POST["nomProduit"]);
    $inputPrixLancement = validationForm($_POST["inputPrixLancement"]);
    $inputDuree = validationForm($_POST["inputDuree"]);
    $inputAugmentationPrix = validationForm($_POST["inputAugmentationPrix"]);
    $inputAugmentationDuree = validationForm($_POST["inputAugmentationDuree"]);
}

function validationForm($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>