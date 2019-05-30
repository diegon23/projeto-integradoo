<?php
	include_once(__DIR__."/../dao/localidade.php");
	
	
	function saveLocalidade($localidade){
		return saveLocalidadeDb(explode(',', $localidade));
	}
	
	function getLocalidade($localidade){
		return getLocalidadeDb($localidade);
	}
?>