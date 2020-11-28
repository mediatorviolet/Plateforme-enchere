<?php 
include 'src/libs/function.php';
if (isset($_POST["submit"])) {
  foreach ($_POST as $items) {
    validationForm($items);
  }
}
?>

<div class="container-fluid p-lg-5 p-md-3">
  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Mettre un produit en vente</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="form-group">
      <label for="nomProduit">Nom du produit</label>
      <input type="text" class="form-control" id="nomProduit" name="nomProduit" required>
      <span class="error"><?php echo $nomProduitErr; ?></span>
    </div>
    <div class="form-group">
      <label for="inputUploadImg">Ajouter une image</label>
      <input type="file" class="form-control-file" id="inputUploadImg" name="inputUploadImg">
    </div>
    <div class="form-group">
      <label for="inputPrixLancement">Prix de lancement (€)</label>
      <input type="number" class="form-control" id="inputPrixLancement" name="inputPrixLancement">
      <span class="error"><?php echo $inputPrixLancementErr; ?></span>
    </div>
    <div class="form-group">
      <label for="inputDuree">Durée de l'enchère (h)</label>
      <input type="number" class="form-control" id="inputDuree" name="inputDuree">
    </div>
    <div class="form-group">
      <label for="inputPrixClic">Prix du clic (cts)</label>
      <input type="number" class="form-control" id="inputPrixClic" name="inputPrixClic">
    </div>
    <div class="form-group">
      <label for="inputAugmentationPrix">Augmentation du prix par clic (cts)</label>
      <input type="number" class="form-control" id="inputAugmentationPrix" name="inputAugmentationPrix">
    </div>
    <div class="form-group">
      <label for="inputAugmentationDuree">Augmentation de la durée par clic (s)</label>
      <input type="number" class="form-control" id="inputAugmentationDuree" name="inputAugmentationDuree">
    </div>
    <button type="submit" name="submit" class="btn btn-dark">Ajouter le produit</button>
  </form>
</div>