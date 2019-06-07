<?php 
	include_once(__DIR__."/../db/db_connnection.php");

	function saveAluguelDb($aluguel){
		$conn = OpenCon();
		
		$sqlSalvar = 'insert into aluguel
		(id_usuario_dono, id_usuario_locatario, dt_inicio, id_produto, status)
		values
		('.$aluguel['id_usuario_locador'].','.$aluguel['id_usuario_locatario'].', CURDATE(), '.$aluguel['produto'][0]['id_produto'].', "ATIVO")';
		
		if($conn->query($sqlSalvar) === TRUE){
			$last_id = $conn->insert_id;
		} else {
			echo $conn->error;
		}
		
		CloseCon($conn);
		
		return $last_id;
	}
	
	function getAluguelProdutoDb($idProduto){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from aluguel where status = "ATIVO" and id_produto = '.$idProduto;
		$aluguel = $conn->query($sqlConsulta);
		$retorno = array();
		if (isset($aluguel) && $aluguel != null && is_object($aluguel) && $aluguel->num_rows > 0) {
			while($row = mysqli_fetch_array($aluguel, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}
	
	
	function getAluguelLocatarioDb($idLocatario){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from aluguel where status = "ATIVO" and id_usuario_locatario = '.$idLocatario;
		$aluguel = $conn->query($sqlConsulta);
		$retorno = array();
		if (isset($aluguel) && $aluguel != null && is_object($aluguel) && $aluguel->num_rows > 0) {
			while($row = mysqli_fetch_array($aluguel, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}
	
	
?>