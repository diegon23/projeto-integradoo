<?php
	include_once("../model/cadastro.php");  
 
	$dados = $_POST;
	if(!existeUsuarioModel($dados)){
		saveUser($dados);
	} else {
		header("Location: ../index.php?mensagem=Usuário já cadastrado com o cpf ".$dados['cpf']."!");
		die();
	}
		
	header("Location: ../index.php?mensagem=Usuário cadastrado com sucesso!");
	die();
?>