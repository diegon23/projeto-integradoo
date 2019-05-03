<?php
	include_once("../model/cadastro.php");  
	$dados = $_POST;
	if(isset($dados['primeiro_nome'])){
		if(!existeUsuarioModel($dados)){
			saveUser($dados);
		} else {
			header("Location: ../index.php?mensagem=Usuário já cadastrado com o cpf/email ".$dados['cpf']."!");
			die();
		}
			
		header("Location: ../index.php?mensagem=Usuário cadastrado com sucesso!");
		die();
	} else if(isset($dados['email'])){
		
		if(existeUsuarioModel($dados)){
			if(!enviarEmail($dados['email'])){
				header("Location: ../index.php?mensagem=Erro ao enviar o e-mail para ".$dados['email']."!");
				die();
			}
		} else {
			header("Location: ../index.php?mensagem=Não há usuário cadastrado com o email ".$dados['email']."!");
			die();
		}
		header("Location: ../index.php?mensagem=E-mail com login e senha enviado para o e-mail cadastrado!");
		die();
	}

?>