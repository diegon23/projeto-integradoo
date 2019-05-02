<?php
	include_once("../model/login.php");
	$_POST;
	
	$usuario = authenticate($_POST);
	
	if ($usuario != null && $usuario['id_usuario'] != null){
		$_SESSION['user'] = $usuario;
	} else {
		header("Location: ../index.php?mensagem=Usuário e/ou senha incorretos!");
		die();
	}
	
?>