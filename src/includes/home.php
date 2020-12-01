<div class="container-fluid p-lg-5 p-md-3">

  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Produits en vente</h2>
  
  <div class="row row-cols-1 row-cols-md-3">
    <?php
      require_once "src/libs/function.php";
      $data_file = 'src/libs/data.json';
      $json_array = json_decode(file_get_contents($data_file), true);
      //print_r($json_array);
    ?>
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
          <p class="card-text mb-0">Prix de lancement : <?= $item["prixLancement"] ?></p>
          <p class="card-text mb-0">Prix du clic : <?= $item["prixClic"] ?></p>
          <p class="card-text mb-0">Augmentation du prix : <?= $item["augmentationPrix"] ?></p>
          <p class="card-text">Augmentation de la durée : <?= $item["augmentationDuree"] ?></p>
          <button type="button" class="btn btn-dark">Enchérir</button>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <?php endforeach; ?>
    <!-- <div class="col mb-4">
      <div class="card h-100">
        <img src="src/resources/img/aude-andre-saturnio-QXAUlcgWYj8-unsplash.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a short card.</p>
          <button type="button" class="btn btn-dark">Enchérir</button>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card h-100">
        <img src="src/resources/img/kyrylo-kholopkin-JB91fiIa9RE-unsplash.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
            content.</p>
          <button type="button" class="btn btn-dark">Enchérir</button>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card h-100">
        <img src="src/resources/img/wolfgang-hasselmann-g4pHm-NOliM-unsplash.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
            content. This content is a little bit longer.</p>
          <button type="button" class="btn btn-dark">Enchérir</button>
        </div>
      </div>
    </div> -->
  </div>
</div>