<?php

function img_upload($img) {
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
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["inputUploadImg"]["size"] > 5000000000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
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
            //echo "<img src=\"src/resources/img/uploads/" . htmlspecialchars(basename($_FILES["inputUploadImg"]["name"])) . "\" class=\"card-img-top\" alt=\"...\">";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
