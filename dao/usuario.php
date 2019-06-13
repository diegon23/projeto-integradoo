<?php 
	require_once __DIR__."/../db/database_functions.php";

	

	function saveUserDb($user){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		
		$sqlSalvar = 'insert into usuario
		(id_tipo, nome, dt_cadastro, cpf, telefone, senha, email)
		values
		('.$user['tipo_usuario'].', "'.$user['nome'].'",  CURDATE(), "'.$user['cpf'].'", "'.$user['telefone'].'", "'.$user['senha'].'", "'.$user['email'].'")';
		$conn->query($sqlSalvar);
		if($conn->errorInfo()[0] === "00000"){
		} else {
			echo $conn->errorInfo()[2];
		}
		
		close_connection($conn);
	}
	
	function getUserIdDb($idUsuario){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario where id_usuario = '.$idUsuario;
		$usuario = $conn->query($sqlConsulta);
		$retorno = array();
		
		while ($row = $usuario->fetch()) {
				$retorno[] = $row;
		}
		
		
		close_connection($conn);
		return $retorno;
	}

	function getUserDb($login, $senha){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario where cpf = "'.$login.'" and senha = "'.$senha.'"';
		$usuario = $conn->query($sqlConsulta);
		$retorno = array();
		while ($row = $usuario->fetch()) {
				$retorno[] = $row;
		}
		
		
		close_connection($conn);
		return $retorno;
	}
	
	function getUserDbEmail($email){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario where email = "'.$email.'"';
		$usuario = $conn->query($sqlConsulta);
		if ($usuario->fetch()) {
			$retorno = $usuario->fetch();
		}
		close_connection($conn);
		
		return $retorno;
	}

	function getUserDbUserId($userId){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario where id_usuario = "'.$userId.'"';
		$usuario = $conn->query($sqlConsulta);
		if ($usuario->fetch()) {
			$retorno = $usuario->fetch();
		}
		close_connection($conn);
		
		return $retorno;
	}
	
	function existeUsuarioCpfEmailTipo($cpf, $email, $tipo){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario where (cpf = "'.$cpf. '" or email = "'. $email.'") and id_tipo = '.$tipo; 
		
		$usuario = $conn->query($sqlConsulta);
		if ($usuario->fetch()) {
			return true;
		}
		close_connection($conn);
		
		return false;
	}
	
	function existeUsuarioEmail($email){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario where email = '.$email;
		$usuario = $conn->query($sqlConsulta);
		if ($usuario->fetch()) {
			return true;
		}
		close_connection($conn);
		
		return false;
	}

?>