<?php
class Articles {
    public $titre;
    public $image;
    public $prixLancement;
    public $duree;
    public $prixClic;
    public $augmentationPrix;
    public $augmentationDuree;

    function __construct($titre, $image, $prixLancement, $duree, $prixClic, $augmentationPrix, $augmentationDuree) {
        $this -> titre = $titre;
        $this -> image = $image;
        $this -> prixLancement = $prixLancement;
        $this -> duree = $duree;
        $this -> prixClic = $prixClic;
        $this -> augmentationPrix = $augmentationPrix;
        $this -> augmentationDuree = $augmentationDuree;
    }
}
?>