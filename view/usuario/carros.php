<?php
include_once("../../model/carroModel.php");
$carro = $_POST;

$target_dir = "../../uploads/";
$target_dir = $target_dir . basename(utf8_decode($_FILES["imagem"]["name"]));

if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_dir)) {
    $carro['foto'] = $target_dir;
	session_start();
	$carro['id_usuario'] = $_SESSION['user'][0]['id_usuario'];
	saveCarro($carro);
	
	header("Location: carros.html");
	
} else {
    echo 'Erro ao fazer upload de imagem.';
	echo '</br><a href="homeLocador.php">Voltar</a>';
}

?>