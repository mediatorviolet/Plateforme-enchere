<?php
    $time = $value["date_fin"] - time(); // Différence entre le temps de l'enchère et le temps actuel
    $h = (int)($time / 3600); // Conversion en heures
    $min = (int)(($time % 3600) / 60); // Conversion en minutes
    $sec = (int)(($time % 3600) % 60); // Conversion en secondes

    // Si h, min ou sec < 10 on rajoute un 0 devant
    if ($h < 10) {
        $h_txt = "0" . $h;
    } else {
        $h_txt = $h;
    }
    if ($min < 10) {
        $min_txt = "0" . $min;
    } else {
        $min_txt = $min;
    }
    if ($sec < 10) {
        $sec_txt = "0" . $sec;
    } else {
        $sec_txt = $sec;
    }

    if ($time <= 0) {
        echo "Expiré"; // Si timer = 0, l'offre est expirée
    } else {
        echo $h_txt . ":" . $min_txt . ":" . $sec_txt; // Affichage du temps restant
    }
?>