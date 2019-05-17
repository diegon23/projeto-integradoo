<?php 
	include_once("../db/db_connnection.php");

	function saveCarroDb($carro){
		$conn = OpenCon();
		
		$sqlSalvar = 'insert into produto
		(modelo, ano, dt_cadastramento, cor,  foto, id_usuario)
		values
		('.$carro['modelo'].', "'.$carro['ano'].'",  CURDATE(), "'.$carro['cor'].'", "'.$carro['foto'].'", "'.$carro['id_usuario'].'")';
		
		if($conn->query($sqlSalvar) === TRUE){
			
		} else {
			echo $conn->error;
		}
		
		CloseCon($conn);
	}
	
	function getCarroDb($idCarro){
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

?>