<?php
	include_once("../model/cadastro.php");  
	$dados = $_POST;
	if(isset($dados['primeiro_nome'])){
		if(!existeUsuarioModel($dados)){
			saveUser($dados);
		} else {
			header("Location: ../login.php?mensagem=Usuário já cadastrado com o cpf/email ".$dados['cpf']." para o tipo ".$dados['tipo_usuario']."!");
			die();
		}
			
		header("Location: ../login.php?mensagem=Usuário cadastrado com sucesso!");
		die();
	} else if(isset($dados['email'])){
		
		if(existeUsuarioModel($dados)){
			if(!enviarEmail($dados['email'])){
				header("Location: ../login.php?mensagem=Erro ao enviar o e-mail para ".$dados['email']."!");
				die();
			}
		} else {
			header("Location: ../login.php?mensagem=Não há usuário cadastrado com o email ".$dados['email']."!");
			die();
		}
		header("Location: ../login.php?mensagem=E-mail com login e senha enviado para o e-mail cadastrado!");
		die();
	}

?>