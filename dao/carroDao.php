<?php 
	include_once(__DIR__."/../db/db_connnection.php");

	function saveCarroDb($carro){
		$conn = OpenCon();
		
		$sqlSalvar = 'insert into produto
		(modelo, ano, dt_cadastramento, cor,  foto, id_usuario)
		values
		("'.$carro['modelo'].'", "'.$carro['ano'].'",  CURDATE(), "'.$carro['cor'].'", "'.$carro['foto'].'", "'.$carro['id_usuario'].'")';
		
		if($conn->query($sqlSalvar) === TRUE){
			
		} else {
			echo $conn->error;
		}
		
		CloseCon($conn);
	}
	
	function getCarrosUsuarioDb($idUsuario){
		$conn = OpenCon();
		
		$sqlConsulta = 'select * from produto where id_usuario = "'.$idUsuario.'" and dt_cancelamento is null';
		
		$carros = $conn->query($sqlConsulta);
		
		$retorno = array();
		
		if (isset($carros) && $carros != null && is_object($carros) && $carros->num_rows > 0) {
			while($row = mysqli_fetch_array($carros, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}
	
	function getCarroDb($idProduto){
		$conn = OpenCon();
		
		$sqlConsulta = 'select * from produto where id_produto = "'.$idProduto.'" and dt_cancelamento is null';
		
		$carro = $conn->query($sqlConsulta);
		
		$retorno = array();
		
		if (isset($carro) && $carro != null && is_object($carro) && $carro->num_rows > 0) {
			while($row = mysqli_fetch_array($carro, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}

?>