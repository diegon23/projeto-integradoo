<?php 
	include_once(__DIR__."/../db/database_functions.php");

	function saveCarroDb($carro){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		
		$sqlSalvar = 'insert into produto
		(modelo, ano, dt_cadastramento, cor,  foto, id_usuario, produtocol)
		values
		("'.$carro['modelo'].'", "'.$carro['ano'].'",  CURDATE(), "'.$carro['cor'].'", "'.$carro['foto'].'", "'.$carro['id_usuario'].'", "'.$carro['descricao'].'")';
		$conn->query($sqlSalvar);
		if($conn->errorInfo()[0] === "00000"){
		} else {
			echo $conn->errorInfo()[2];
		}
		
		close_connection($conn);
	}
	
	function getCarrosUsuarioDb($idUsuario){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		
		$sqlConsulta = 'select * from produto where id_usuario = "'.$idUsuario.'" and dt_cancelamento is null';
		
		$carros = $conn->query($sqlConsulta);
		
		$retorno = array();
		
		while ($row = $carros->fetch()) {
				$retorno[] = $row;
		}
		
		close_connection($conn);
		return $retorno;
	}
	
	function getCarroDb($idProduto){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		
		$sqlConsulta = 'select * from produto where id_produto = "'.$idProduto.'" and dt_cancelamento is null';
		
		$carro = $conn->query($sqlConsulta);
		
		$retorno = array();
		
		while ($row = $carro->fetch()) {
				$retorno[] = $row;
		}
		
		close_connection($conn);
		return $retorno;
	}

?>