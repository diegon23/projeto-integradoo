<?php 
	include_once(__DIR__."/../db/db_connnection.php");

	function saveLocalidadeDb($localidade){
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
	
	function getLocalidadeDb($idLocalidade){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from localidade where id_localidade = '.$idLocalidade;
		$localidade = $conn->query($sqlConsulta);
		$retorno = array();
		if (isset($localidade) && $localidade != null && is_object($localidade) && $localidade->num_rows > 0) {
			while($row = mysqli_fetch_array($localidade, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}
	
	
?>