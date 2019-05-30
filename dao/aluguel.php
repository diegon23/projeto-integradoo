<?php 
	include_once(__DIR__."/../db/db_connnection.php");

	function saveAluguelDb($aluguel){
		$conn = OpenCon();
		
		$sqlSalvar = 'insert into localidade
		(cidade, endereco, numero)
		values
		("'.$localidade[0].'","'.$localidade[1].'","'.$localidade[2].'")';
		
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
		$sqlConsulta = 'select * from aluguel where id_produto = '.$idProduto;
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