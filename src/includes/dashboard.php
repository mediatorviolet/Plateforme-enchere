<?php
require_once "src/libs/function.php";
$data_file = "src/libs/data.json";
$json_array = json_decode(file_get_contents($data_file), true);
?>

<div class="container-fluid ">
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
        <th class="align-middle text-center" scope="col">Activer / Désactiver</th>
        <th class="align-middle text-center" scope="col">Modifier</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($json_array as $key => $value) : ?>
        <tr>
          <th class="align-middle text-center" scope="row"><?= $key ?></th>
          <td class="align-middle text-center"><?= $value["titre"] ?></td>
          <td><img src="<?= $value["image"] ?>" alt="" class="img-thumbnail" style="max-width: 150px"></td>
          <td class="align-middle text-center"><?= $value["prixLancement"] ?></td>
          <td id="duree_<?= $key ?>" class="align-middle text-center"><?php include "src/libs/timer.php" ?></td>
          <td class="align-middle text-center"><?= $value["prixClic"] ?></td>
          <td class="align-middle text-center"><?= $value["augmentationPrix"] ?></td>
          <td class="align-middle text-center"><?= $value["augmentationDuree"] ?></td>
          <td class="align-middle text-center text-uppercase font-weight-bold <?= $value["etat"] == "actif" ? "text-success" : "text-danger" ?>"><?= $value["etat"] ?></td>
          <td class="align-middle text-center">
          <form action="<?= change_state() ?>" method="post" id="<?= $value["id"] ?>">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="<?= $key ?>" name="state" onchange="this.form.submit()" 
              <?php 
                $check = "";
                if ($value["etat"] == "actif") {
                  $check = "checked";
                } else {
                  $check = "";
                }
                echo $check;
              ?>>
              <label class="custom-control-label" for="<?= $key ?>"></label>
              <input type="hidden" name="indice" value="<?= $key ?>">
            </div>
          </form>
          </td>
          <td class="align-middle text-center">
            <form action="<?= "admin.php?page=formModif" ?>" method="post">
              <input type="hidden" name="id" value="<?= $key ?>">
              <button type="submit" name="modif" class="btn btn-outline-light">Modifier</button>
            </form>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<?php
//Cette partie sert à rafraichir les timers de chaque enchère
$json_array = json_decode(file_get_contents('src/libs/data.json'), true);
for ($x = 0; $x < count($json_array); $x++) {     //On récupère la longueur du tableau contenant des produits, on rafraichit le temps de chaque enchère
?>


  <script>
    $(document).ready(function() {

      function myFunction() {
        var myVar = setInterval(function() {
          $('<?php echo '#duree_' . $x ?>').load('admin.php?page=dashboard <?php echo '#duree_' . $x ?>');
        }, 1000);
      };

      myFunction();
    })
  </script>

<?php } ?>