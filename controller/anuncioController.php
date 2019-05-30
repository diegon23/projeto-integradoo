<?php
	include_once("../model/anuncio.php");
	include_once("../model/localidade.php");
	$anuncio = $_POST;
	
	session_start();
	$anuncio["id_usuario"] = $_SESSION["user"][0]["id_usuario"];
	
	
	$anuncio["id_localidade"] = saveLocalidade($anuncio["local"]);
	
	saveAnuncio($anuncio);
	
	header("Location: ../view/usuario/homeLocador.php");
	
?>