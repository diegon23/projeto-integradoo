<?php
	include_once("../model/anuncio.php");
	include_once("../model/localidade.php");
	$anuncio = $_POST;
	
	session_start();
	if(sizeof($_SESSION["user"]) > 1){
		$anuncio["id_usuario"] = $_SESSION["user"][0]["id_usuario"];
	} else {
		$anuncio["id_usuario"] = $_SESSION["user"]["id_usuario"];
	}
	
	$anuncio["id_localidade"] = saveLocalidade($anuncio["local"]);
	
	saveAnuncio($anuncio);
	
	header("Location: ../view/usuario/homeLocador.html");
	
?>