<div class="container-fluid p-lg-5 p-md-3">
  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Mettre un produit en vente</h2>
  <form>
    <div class="form-group">
      <label for="nomProduit">Nom du produit</label>
      <input type="text" class="form-control" id="nomProduit" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Ajouter une image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
      <label for="inputPrixLancement">Prix de lancement (€)</label>
      <input type="number" class="form-control" id="inputPrixLancement">
    </div>
    <div class="form-group">
      <label for="inputDuree">Durée de l'enchère (h)</label>
      <input type="number" class="form-control" id="inputDuree">
    </div>
    <div class="form-group">
      <label for="inputPrixClic">Prix du clic (cts)</label>
      <input type="number" class="form-control" id="inputPrixClic">
    </div>
    <div class="form-group">
      <label for="inputAugmentationPrix">Augmentation du prix par clic (cts)</label>
      <input type="number" class="form-control" id="inputAugmentationPrix">
    </div>
    <div class="form-group">
      <label for="inputAugmentationDuree">Augmentation de la durée par clic (s)</label>
      <input type="number" class="form-control" id="inputAugmentationDuree">
    </div>
    <button type="submit" class="btn btn-dark">Ajouter le produit</button>
  </form>
</div>