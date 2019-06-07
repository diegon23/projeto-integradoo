<?php
	require_once __DIR__."\..\dao\carroDao.php";
	
	function saveCarro($carro){
		return saveCarroDb($carro);
	}
	
	function getCarrosUsuario($usuario){
		return getCarrosUsuarioDb($usuario);
	}
	
	function getCarro($idProduto){
		return getCarroDb($idProduto);
	}
	
?>