<?php
	include_once("../model/login.php");
	
	$usuario = authenticate($_POST);
	
	if ($usuario[0] != null && $usuario[0]['id_usuario'] != null){
		session_start();
		$_SESSION["user"] = $usuario;
		
		if(count($_SESSION["user"]) > 1){
			header("Location: ../view/usuario/tipoUsuario.html");
			die();
		} else {
			if($usuario[0]['id_tipo'] == 1){
				header("Location: ../view/usuario/homeLocador.php");
				die();
			} else if($usuario[0]['id_tipo'] == 2){
				header("Location: ../view/anuncio/home.php");
				die();
			}
		}
	} else {
		header("Location: ../login.php?mensagem=Usuário e/ou senha incorretos!");
		die();
	}
	
?>