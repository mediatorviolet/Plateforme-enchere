<?php
    session_start();

    if (!isset($_SESSION["admin"])) {
        $_SESSION["admin"] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="src/resources/style/index.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'src/includes/header.php' ?>
    <?php include 'src/includes/home.php' ?>

    <?php 
    //Cette partie sert à rafraichir les timers de chaque enchère
    $json_array = json_decode(file_get_contents('src/libs/data.json'), true);
    for ($x = 0; $x < count($json_array); $x++) {     //On récupère la longueur du tableau contenant des produits, on rafraichit le temps de chaque enchère
    ?>


        <script>
            $(document).ready(function() {

                function myFunction() {
                    var myVar = setInterval(function() {
                        $('<?php echo '#duree_' . $x ?>').load('index.php <?php echo '#duree_' . $x ?>');
                    }, 1000);
                };

                myFunction();
            })
        </script>

    <?php } ?>
</body>

</html>