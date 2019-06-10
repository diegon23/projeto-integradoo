<?php
	include_once(__DIR__."/../dao/aluguel.php");
	
	
	function saveAluguel($aluguel){
		return saveAluguelDb($aluguel);
	}
	
	function getAluguelProduto($idProduto){
		return getAluguelProdutoDb($idProduto);
	}
	
	function getAluguelLocatario($idLocatario){
		return getAluguelLocatarioDb($idLocatario);
	}
	
	function deleteAluguel($idAluguel){
		return deleteAluguelDb($idAluguel);
	}
?>