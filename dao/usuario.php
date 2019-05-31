<?php 
	include_once("../db/db_connnection.php");

	function saveUserDb($user){
		$conn = OpenCon();
		
		$sqlSalvar = 'insert into usuario
		(id_tipo, nome, dt_cadastro, cpf, telefone, senha, email)
		values
		('.$user['tipo_usuario'].', "'.$user['nome'].'",  CURDATE(), "'.$user['cpf'].'", "'.$user['telefone'].'", "'.$user['senha'].'", "'.$user['email'].'")';
		
		if($conn->query($sqlSalvar) === TRUE){
			
		} else {
			echo $conn->error;
		}
		
		CloseCon($conn);
	}
	
	function getUserDb($login, $senha){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from usuario where cpf = "'.$login.'" and senha = "'.$senha.'"';
		$usuario = $conn->query($sqlConsulta);
		$retorno = array();
		if (isset($usuario) && $usuario != null && is_object($usuario) && $usuario->num_rows > 0) {
			while($row = mysqli_fetch_array($usuario, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}
	
	function getUserDbEmail($email){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from usuario where email = "'.$email.'"';
		$usuario = $conn->query($sqlConsulta);
		if (isset($usuario) && $usuario != null && is_object($usuario) && $usuario->num_rows > 0) {
			$retorno = $usuario->fetch_assoc();
		}
		CloseCon($conn);
		
		return $retorno;
	}

	function getUserDbUserId($userId){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from usuario where id_usuario = "'.$userId.'"';
		$usuario = $conn->query($sqlConsulta);
		if (isset($usuario) && $usuario != null && is_object($usuario) && $usuario->num_rows > 0) {
			$retorno = $usuario->fetch_assoc();
		}
		CloseCon($conn);
		
		return $retorno;
	}
	
	function existeUsuarioCpfEmailTipo($cpf, $email, $tipo){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from usuario where (cpf = "'.$cpf. '" or email = "'. $email.'") and id_tipo = '.$tipo; 
		$usuario = $conn->query($sqlConsulta);
		if (isset($usuario) && $usuario != null && is_object($usuario) && $usuario->num_rows > 0) {
			return true;
		}
		CloseCon($conn);
		
		return false;
	}
	
	function existeUsuarioEmail($email){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from usuario where email = '.$email;
		$usuario = $conn->query($sqlConsulta);
		if (isset($usuario) && $usuario != null && is_object($usuario) && $usuario->num_rows > 0) {
			return true;
		}
		CloseCon($conn);
		
		return false;
	}

?>