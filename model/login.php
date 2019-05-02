<?php
	include_once("../dao/usuario.php");
	
	function authenticate($user){
		$cpf = $user['login'];
		$senha = $user['senha'];
		
		return getUserDb($cpf, $senha);
	}
?>