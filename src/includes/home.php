<?php
  require_once "src/libs/function.php";
  date_default_timezone_set("Indian/Reunion");
  $data_file = 'src/libs/data.json';
  $json_array = json_decode(file_get_contents($data_file), true);
?>

<div class="container-fluid p-lg-5 p-md-3">

  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Produits en vente</h2>
  
  <div class="row row-cols-1 row-cols-md-3">
    <?php foreach($json_array as $key => $value) :?>
    <div class="col mb-4">
      <div id="<?= $value["id"] ?>" class="card h-100">
        <img src="<?= $value["image"] == "src/resources/img/uploads/" ? "src/resources/img/453x302.png" : $value["image"] ?>" 
        class="card-img-top" alt="...">
      <div id="duree_<?= $value["id"] ?>"
        class="duree bg-dark text-light position-absolute d-flex justify-content-center align-items-center font-weight-bold">
        <?= $value["duree"] ?></div>
        <div class="card-body">
          <h5 class="card-title font-weight-bold text-capitalize"><?= $value["titre"] ?></h5>
          <p class="card-text mb-0">Prix de lancement : <?= $value["prixLancement"] ?> €</p>
          <p class="card-text mb-0">Prix du clic : <?= $value["prixClic"] ?> cts / clic</p>
          <p class="card-text mb-0">Augmentation du prix : <?= $value["augmentationPrix"] ?> cts /clic</p>
          <p class="card-text">Augmentation de la durée : <?= $value["augmentationDuree"] ?> s / clic</p>
          <form action="<?= enchere() ?>" method="POST">
            <input type="hidden" name="hint" value="<?= $key ?>">
            <button id="<?= $value["id"] ?>" type="submit" name="encherir" class="btn btn-dark">Enchérir</button>
          </form>
        </div>
      </div>
    </div>

    <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
    <script src="src/resources/scripts/easytimer.min.js"></script>
    <!-- <script>
        var timerInstance = new easytimer.Timer();
        //var timer = new Timer();
        timerInstance.start({countdown: true, startValues: {seconds: <?= $value["duree"] ?>}});
        $('#duree_<?= $value["id"] ?>').html(timerInstance.getTimeValues().toString());
        timerInstance.addEventListener('secondsUpdated', function(e) {
          $('#duree_<?= $value["id"] ?>').html(timerInstance.getTimeValues().toString());
        });
        timerInstance.addEventListener('targetAchieved', function(e) {
          $('#duree_<?= $value["id"] ?>').html('Expiré');
        });
    </script> -->
    <?php endforeach; ?>
  </div>
</div>