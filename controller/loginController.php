<?php
	include_once("../model/login.php");
	
	$usuario = authenticate($_POST);
	
	if ($usuario != null && $usuario['id_usuario'] != null){
		session_start();
		$_SESSION["user"] = $usuario;
		header("Location: ../view/usuario/tipoUsuario.html");
		die();
	} else {
		header("Location: ../index.php?mensagem=Usuário e/ou senha incorretos!");
		die();
	}
	
?>