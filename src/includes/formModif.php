<?php
require_once "src/libs/modif.php";
/*if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["modifier"])) {
    validation_modif();
}*/

$json_array = json_decode(file_get_contents("src/libs/data.json"), true);
$id = $_POST["id"];
?>

<div class="container-fluid p-lg-5 p-md-3">
  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Modifier un produit</h2>
  <div class="col-3 text-center mx-auto alert alert-<?= $class_alert ?>"><?= $msg_alert ?></div>
  <form action="<?= validation_modif() ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="lead" for="nomProduit">Nom du produit</label>
      <input type="text" class="form-control" id="nomProduit" name="nom_maj" value="<?= $json_array[$id]["titre"] ?>">
    </div>
    <div class="form-group">
      <label class="lead" for="inputUploadImg">Ajouter une image</label>
      <input type="file" class="form-control-file" id="inputUploadImg" name="inputUploadImg" value="<?= $json_array[$id]["image"] ?>">
    </div>
    <div class="form-group">
      <label class="lead" for="inputPrixLancement">Prix de lancement (€)</label>
      <input type="number" class="form-control" id="inputPrixLancement" name="prix_maj" value="<?= $json_array[$id]["prixLancement"] ?>">
    </div>
    <div class="form-group">
      <label class="lead" for="inputDuree">Durée de l'enchère (h)</label>
      <input type="number" class="form-control" id="inputDuree" name="duree_maj" value="<?= intval($json_array[$id]["duree"] / 3600) ?>">
    </div>
    <div class="form-group">
      <label class="lead" for="inputPrixClic">Prix du clic (cts)</label>
      <input type="number" class="form-control" id="inputPrixClic" name="prixClic_maj" value="<?= $json_array[$id]["prixClic"] ?>">
    </div>
    <div class="form-group">
      <label class="lead" for="inputAugmentationPrix">Augmentation du prix par clic (cts)</label>
      <input type="number" class="form-control" id="inputAugmentationPrix" name="augmentationPrix_maj" value="<?= $json_array[$id]["augmentationPrix"] ?>">
    </div>
    <div class="form-group">
      <label class="lead" for="inputAugmentationDuree">Augmentation de la durée par clic (s)</label>
      <input type="number" class="form-control" id="inputAugmentationDuree" name="augmentationDuree_maj" value="<?= $json_array[$id]["augmentationDuree"] ?>">
    </div>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit" name="modifier" class="btn btn-dark">Modifier le produit</button>
  </form>
</div>