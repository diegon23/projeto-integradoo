<?php
	require_once __DIR__."/../../model/carroModel.php";
	require_once __DIR__."/../../model/aluguel.php";
	$aluguel = $_POST;
	
	session_start();
	
	$aluguel["id_usuario_locatario"] = $_SESSION["user"][0]["id_usuario"];
	
	$aluguel["produto"] = getCarro($aluguel["idProduto"]);

	$aluguel["id_usuario_locador"] = $aluguel["produto"][0]["id_usuario"];
	
	saveAluguel($aluguel);
	
	header("Location: home.php");
	
?>