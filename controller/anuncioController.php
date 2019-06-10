<?php
	include_once("../model/anuncio.php");
	include_once("../model/localidade.php");
	include_once("../model/aluguel.php");
	$anuncio = $_POST;
	
	session_start();
	
if(isset($_GET['idAluguel'])){
	deleteAluguel($_GET['idAluguel']);
	
	header("Location: ../view/anuncio/meusAnuncios.php");
} else {
	$anuncio["id_usuario"] = $_SESSION["user"][0]["id_usuario"];
	
	$anuncio["id_localidade"] = saveLocalidade($anuncio["local"]);
	
	saveAnuncio($anuncio);
	
	header("Location: ../view/usuario/homeLocador.php");
}
?>