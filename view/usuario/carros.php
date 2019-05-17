<?php
$target_dir = "../../uploads/";
$target_dir = $target_dir . basename( $_FILES["imagem"]["name"]);
$uploadOk=1;

if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_dir)) {
    echo "The file ". basename( $_FILES["imagem"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>