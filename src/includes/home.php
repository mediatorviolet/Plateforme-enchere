<?php
  require_once "src/libs/function.php";
  $data_file = 'src/libs/data.json';
  $json_array = json_decode(file_get_contents($data_file), true);
  //print_r($json_array);
?>
<div class="container-fluid p-lg-5 p-md-3">

  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Produits en vente</h2>
  
  <div class="row row-cols-1 row-cols-md-3">
    <?php foreach(array_reverse($json_array) as $key => $value) :?>
    <?php foreach($value as $val => $item) :?>
    <div class="col mb-4">
      <div class="card h-100">
        <img src="<?= $item["image"] == "src/resources/img/uploads/" ? "src/resources/img/453x302.png" : $item["image"] ?>" 
        class="card-img-top" alt="...">
      <div class="duree bg-dark text-light position-absolute d-flex justify-content-center align-items-center font-weight-bold">
      <?= $item["duree"] ?></div>
        <div class="card-body">
          <h5 class="card-title font-weight-bold text-capitalize"><?= $item["titre"] ?></h5>
          <p class="card-text mb-0">Prix de lancement : <?= $item["prixLancement"] ?> €</p>
          <p class="card-text mb-0">Prix du clic : <?= $item["prixClic"] ?> cts / clic</p>
          <p class="card-text mb-0">Augmentation du prix : <?= $item["augmentationPrix"] ?> cts /clic</p>
          <p class="card-text">Augmentation de la durée : <?= $item["augmentationDuree"] ?> s / clic</p>
          <input type="hidden" name="hint" value="">
          <button type="button" class="btn btn-dark">Enchérir</button>
        </div>
      </div>
    </div>

    <script>
    //Gestion du timer by Vincent
      var timer = setInterval(function countDown() {
          var tempAct = new Date(); //On recupere la date UNIX
          var heure = Math.floor(tempAct.getTime() / 1000); //On transforme la date en secondes depuis la date fixe UNIX
          var timeRemaining = <?php echo $items['date_fin']?> - heure; //On compare les secondes depuis date fixe UNIX PHP à JS
          var hoursRemaining = parseInt(timeRemaining / 3600); // conversion en heures
          var minutesRemaining = parseInt((timeRemaining % 3600) / 60); // conversion en minutes
          var secondsRemaining = parseInt((timeRemaining % 3600) % 60); // conversion en secondes
          //On attribue l'id de l'enchere dans la zone où il y a le timer et on dit que l'on souhaite afficher le timer
          document.getElementById('<?= $items['duree'] ?>').innerHTML = hoursRemaining + ' h : ' + minutesRemaining + ' m : ' + secondsRemaining + ' s ';
          if (timeRemaining <= 0) {//Sinon on met expire et on desactive le bouton encherir
              document.getElementById('<?= $items['duree'] ?>').innerHTML = "EXPIRE";
          }
      }, 1000); // répéte la fonction toutes les 1 seconde
    </script>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
</div>