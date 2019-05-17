<?php
	include_once("../dao/carro.php");
	
	function saveCarro($carro){
		return saveCarroDb($carro);
	}
	
?>