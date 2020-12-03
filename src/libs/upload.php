<?php

/*function img_upload() {
    $target_dir = "src/resources/img/uploads/";
    $target_file = $target_dir . basename($_FILES["inputUploadImg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if  image file is an actual image or a fake one
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["inputUploadImg"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            //$target_file = "src/resources/img/453x302.png";
            $uploadOk = 1;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["inputUploadImg"]["size"] > 5000000000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["inputUploadImg"]["tmp_name"], $target_file)) {
            //echo "The file " . htmlspecialchars(basename($_FILES["inputUploadImg"]["name"])) . " has been uploaded.";
            echo "<img src=" . $target_file . "\" class=\"card-img-top\" alt=\"...\">";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}*/

function img_upload()
{
    $fileName = $_FILES["inputUploadImg"]["name"];
    if ($fileName !== "") { // On vérifie que la variable img n'est pas vide
        $validExt = array(".jpg", ".jpeg", ".png", ".gif");
        /*if ($_FILES["inputUploadImg"]["error"] > 0) {
            echo "Une erreur est survenue lors du transfert de l'image.";
            echo $_FILES["inputUploadImg"]["error"];
            die;
        }*/
        $fileError = $_FILES["inputUploadImg"]["error"];
        switch ($fileError) {
            case UPLOAD_ERR_INI_SIZE:
                echo "Exceeds max size in php.ini";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "Exceeds max size in html form";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "No /tmp dir to write to";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Error writing to disk";
                break;
            default:
                echo "No error was faced! Phew!";
                break;
        }
        if ($_FILES["inputUploadImg"]["size"] > 5000000000000000) {
            echo "Le ficher est trop lourd.";
            die;
        }
        $fileExt = strtolower(substr(strrchr($fileName, '.'), 1));
        if (!in_array("." . $fileExt, $validExt)) {
            echo "Une image valide est une image .jpg, .jpeg. png ou .gif.";
            die;
        }
        $tmp_name = $_FILES["inputUploadImg"]["tmp_name"];
        $idName = md5(uniqid(rand(), true));
        $name = basename($_FILES["inputUploadImg"]["name"]);
        $target_dir = "src/resources/img/uploads/" . $name;
        $_POST['inputUploadImg'] = $name;
        move_uploaded_file($tmp_name, "$target_dir");
        /*$target_file = $target_dir . basename($_FILES["inputUploadImg"]["name"]);
        //$_POST["inputUploadImg"] = $tmp_name . "." . $fileExt;
        $_POST["inputUploadImg"] = $fileName;
        $result = move_uploaded_file($fileName, $target_file);*/
    } else {
        $_POST["inputUploadImg"] = "src/resources/img/453x302.png";
    }
}
