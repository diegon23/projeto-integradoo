<?php
	require_once __DIR__."\..\dao\carroDao.php";
	
	function saveCarro($carro){
		return saveCarroDb($carro);
	}
	
	function getCarrosUsuario($usuario){
		return getCarrosUsuarioDb($usuario);
	}
	
	function getCarro($usuario){
		return getCarroDb($usuario);
	}
	
?>