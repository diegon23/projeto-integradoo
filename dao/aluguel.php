<?php 
	include_once(__DIR__."/../db/database_functions.php");

	function saveAluguelDb($aluguel){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		
		$sqlSalvar = 'insert into aluguel
		(id_usuario_dono, id_usuario_locatario, dt_inicio, id_produto, status)
		values
		('.$aluguel['id_usuario_locador'].','.$aluguel['id_usuario_locatario'].', CURDATE(), '.$aluguel['produto'][0]['id_produto'].', "ATIVO")';
		
		$last_id = 0;
		$conn->query($sqlSalvar);
		if($conn->errorInfo()[0] == "00000"){
			$last_id = $conn->lastInsertId();
		} else {
			echo $conn->errorInfo()[2];
		}
		
		close_connection($conn);
		
		return $last_id;
	}
	
	function getAluguelProdutoDb($idProduto){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from aluguel where status = "ATIVO" and id_produto = '.$idProduto;
		$aluguel = $conn->query($sqlConsulta);
		$retorno = array();
		while ($row = $aluguel->fetch()) {
				$retorno[] = $row;
		}
		
		close_connection($conn);
		return $retorno;
	}
	
	function getAluguelLocatarioDb($idLocatario){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from aluguel where status = "ATIVO" and id_usuario_locatario = '.$idLocatario;
		$aluguel = $conn->query($sqlConsulta);
		$retorno = array();
		while ($row = $aluguel->fetch()) {
				$retorno[] = $row;
		}
		
		close_connection($conn);
		return $retorno;
	}
	
	function deleteAluguelDb($idAluguel){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		try {
			$stmt = $conn->prepare('DELETE FROM aluguel WHERE id_aluguel = :id');
			$stmt->bindParam(':id', $idAluguel); 
			$stmt->execute(); 
		  } catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage(); die;
		  }

	}
	
	
?>