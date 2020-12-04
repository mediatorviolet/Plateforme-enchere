<?php
    session_start();
    // Si on est pas connecté en tant qu'admin, on est automatiquement renvoyé sur index.php
    if(!$_SESSION["admin"]) {
        header('Location: index.php');
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
    <link rel="stylesheet" href="src/resources/style/admin.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'src/includes/header.php' ?>
    <?php // On choisit la page à inclure lorsqu'on clique sur un des liens présent dans la navbar
        $page_ok = array(
            "#" => "dashboard.php",
            "dashboard" => "dashboard.php",
            "formAdmin" => "formAdmin.php"
        );
        if (isset($_GET['page']) and (isset($page_ok[$_GET["page"]]))) {
            $page = $_GET['page'];
            include ("src/includes/" . $page_ok[$page]);
          } else {
              include "src/includes/dashboard.php";
          }
    ?>
</body>

</html>