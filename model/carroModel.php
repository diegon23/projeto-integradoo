<?php
	require_once __DIR__."\..\dao\carroDao.php";
	
	function saveCarro($carro){
		return saveCarroDb($carro);
	}
	
?>