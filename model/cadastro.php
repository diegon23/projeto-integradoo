<?php 
	include_once("../dao/usuario.php");
	
	function saveUser($user){
		
		$user['nome'] = $user['primeiro_nome'].' '.$user['ultimo_nome'];
		$user['telefone'] = $user['ddd'].' '.$user['telefone'];
		
		saveUserDb($user);
	}
	
	function existeUsuarioModel($user){
		return existeUsuario($user['cpf']);
	}

?>