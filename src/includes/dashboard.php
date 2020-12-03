<?php
    $data_file = "src/libs/data.json";
    $json_array = json_decode(file_get_contents($data_file), true);
?>

<div class="container-fluid p-lg-5 p-md-3">
    <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Tableau de bord</h2>
    <table class=" table table-responsive table-hover table-dark">
  <thead>
    <tr>
      <th class="align-middle text-center" scope="col">#</th>
      <th class="align-middle text-center" scope="col">Titre</th>
      <th class="align-middle text-center" scope="col">Image</th>
      <th class="align-middle text-center" scope="col">Prix</th>
      <th class="align-middle text-center" scope="col">Temps restant</th>
      <th class="align-middle text-center" scope="col">Prix du clic</th>
      <th class="align-middle text-center" scope="col">Augmentation du prix</th>
      <th class="align-middle text-center" scope="col">Augmentation de la durée</th>
      <th class="align-middle text-center" scope="col">Etat</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($json_array as $key => $value) :?>
    <tr>
      <th class="align-middle text-center" scope="row"><?= $key ?></th>
      <td class="align-middle text-center"><?= $value["titre"] ?></td>
      <td><img src="<?= $value["image"] ?>" alt="" class="img-thumbnail" style="max-width: 150px"></td>
      <td class="align-middle text-center"><?= $value["prixLancement"] ?></td>
      <td class="align-middle text-center">Temps restant ??</td>
      <td class="align-middle text-center"><?= $value["prixClic"] ?></td>
      <td class="align-middle text-center"><?= $value["augmentationPrix"] ?></td>
      <td class="align-middle text-center"><?= $value["augmentationDuree"] ?></td>
      <td class="align-middle text-center"><?= $value["etat"] ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>