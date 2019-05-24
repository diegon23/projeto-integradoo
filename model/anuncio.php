<?php
	require_once __DIR__."/../dao/anuncio.php";
	
	function saveAnuncio($anuncio){
		saveAnuncioDb($anuncio);
	}
	
	function getAnuncios($idUsuario){
		return getAnunciosDb($idUsuario);
	}
	
?>