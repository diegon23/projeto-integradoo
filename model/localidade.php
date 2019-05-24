<?php
	include_once("../dao/localidade.php");
	
	
	function saveLocalidade($localidade){
		return saveLocalidadeDb(explode(',', $localidade));
	}
?>