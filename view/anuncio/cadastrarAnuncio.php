<?php
	require_once __DIR__."/../../model/carroModel.php";
	require_once __DIR__."/../../model/aluguel.php";
	require_once __DIR__."/../../model/cadastro.php";
	$aluguel = $_POST;
	
	session_start();
	
	$aluguel["id_usuario_locatario"] = $_SESSION["user"][0]["id_usuario"];
	
	$aluguel["produto"] = getCarro($aluguel["idProduto"]);

	$aluguel["id_usuario_locador"] = $aluguel["produto"][0]["id_usuario"];
	
	$usuario1 = getUserId($aluguel["id_usuario_locatario"]);
	$usuario2 = getUserId($aluguel["id_usuario_locador"]);
	if($usuario1[0]["cpf"] == $usuario2[0]["cpf"]){
		echo 'Esse anúncio é seu, não pode ser alugado por você mesmo</br><a href = "home.php">Home</a>'; die;
	}
	saveAluguel($aluguel);
	
	header("Location: home.php");
	
?>