<?php 
	include_once("../db/db_connnection.php");

	function saveAnuncioDb($anuncio){
		$conn = OpenCon();
		
		$sqlSalvar = 'insert into usuario_produto
		(local_retirada, local_entrega, id_usuario, id_produto, dt_cadastro, valor_dia, dt_inicio_disp, dt_fim_disp)
		values
		('.$anuncio["id_localidade"].','.$anuncio["id_localidade"].','.$anuncio["id_usuario"].','.$anuncio["idCarro"].', CURDATE(),'.$anuncio["preco"].',"'.$anuncio["dataInicio"].'","'.$anuncio["dataFim"].'")';

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