<?php

function img_upload()
{
    $fileName = $_FILES["inputUploadImg"]["name"];
    if ($fileName !== "") { // On vérifie que la variable img n'est pas vide
        $validExt = array(".jpg", ".jpeg", ".png", ".gif");
        
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
    } else {
        $_POST["inputUploadImg"] = "src/resources/img/453x302.png";
    }
}
