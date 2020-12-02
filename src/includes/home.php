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
      <div id="<?= $value["duree"] ?>"
        class="duree bg-dark text-light position-absolute d-flex justify-content-center align-items-center font-weight-bold">
        <?= $value["duree"] ?></div>
        <div class="card-body">
          <h5 class="card-title font-weight-bold text-capitalize"><?= $value["titre"] ?></h5>
          <p class="card-text mb-0">Prix de lancement : <?= $value["prixLancement"] ?> €</p>
          <p class="card-text mb-0">Prix du clic : <?= $value["prixClic"] ?> cts / clic</p>
          <p class="card-text mb-0">Augmentation du prix : <?= $value["augmentationPrix"] ?> cts /clic</p>
          <p class="card-text">Augmentation de la durée : <?= $value["augmentationDuree"] ?> s / clic</p>
          <form action="<?= enchere() ?>" method="POST">
            <input type="text" name="hint" value="<?= $key ?>">
            <button id="<?= $value["id"] ?>" type="submit" name="encherir" class="btn btn-dark">Enchérir</button>
          </form>
        </div>
      </div>
    </div>

    <script>
    //Gestion du timer by Vincent
      var timer = setInterval(function countDown() {
          var tempAct = new Date(); //On recupere la date UNIX
          var heure = Math.floor(tempAct.getTime() / 1000); //On transforme la date en secondes depuis la date fixe UNIX
          var timeRemaining = <?php echo $value['date_fin']?> - heure; //On compare les secondes depuis date fixe UNIX PHP à JS
          var hoursRemaining = parseInt(timeRemaining / 3600); // conversion en heures
          var minutesRemaining = parseInt((timeRemaining % 3600) / 60); // conversion en minutes
          var secondsRemaining = parseInt((timeRemaining % 3600) % 60); // conversion en secondes
          //On attribue l'id de l'enchere dans la zone où il y a le timer et on dit que l'on souhaite afficher le timer
          document.getElementById('<?= $value['duree'] ?>').innerHTML = hoursRemaining + ' h : ' + minutesRemaining + ' m : ' + secondsRemaining + ' s ';
          if (timeRemaining <= 0) {//Sinon on met expire et on desactive le bouton encherir
              document.getElementById('<?= $value['duree'] ?>').innerHTML = "EXPIRE";
          }
      }, 1000); // répéte la fonction toutes les 1 seconde
    </script>
    <?php endforeach; ?>
  </div>
</div>