<?php
require_once 'src/libs/function.php';
require_once 'src/libs/upload.php';
if (isset($_POST["submit"])) {
  validationForm();
  img_upload();
}
?>

<div class="container-fluid p-lg-5 p-md-3">
  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Mettre un produit en vente</h2>
  <div class="col-3 text-center mx-auto alert alert-<?= $class_alert ?>"><?= $msg_alert ?></div>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="lead" for="nomProduit">Nom du produit</label>
      <input type="text" class="form-control" id="nomProduit" name="nomProduit">
      <span class="alert-danger"><?php echo $nomProduitErr; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="inputUploadImg">Ajouter une image</label>
      <input type="file" class="form-control-file" id="inputUploadImg" name="inputUploadImg">
    </div>
    <div class="form-group">
      <label class="lead" for="inputPrixLancement">Prix de lancement (€)</label>
      <input type="number" class="form-control" id="inputPrixLancement" name="inputPrixLancement">
      <span class="alert-danger"><?php echo $inputPrixLancementErr; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="inputDuree">Durée de l'enchère (h)</label>
      <input type="number" class="form-control" id="inputDuree" name="inputDuree">
      <span class="alert-danger"><?php echo $inputDureeErr; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="inputPrixClic">Prix du clic (cts)</label>
      <input type="number" class="form-control" id="inputPrixClic" name="inputPrixClic">
      <span class="alert-danger"><?php echo $inputPrixClicErr; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="inputAugmentationPrix">Augmentation du prix par clic (cts)</label>
      <input type="number" class="form-control" id="inputAugmentationPrix" name="inputAugmentationPrix">
      <span class="alert-danger"><?php echo $inputAugmentationPrixErr; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="inputAugmentationDuree">Augmentation de la durée par clic (s)</label>
      <input type="number" class="form-control" id="inputAugmentationDuree" name="inputAugmentationDuree">
      <span class="alert-danger"><?php echo $inputAugmentationDureeErr; ?></span>
    </div>
    <button type="submit" name="submit" class="btn btn-dark">Ajouter le produit</button>
  </form>
</div>