<?php 
	include_once(__DIR__."/../db/database_functions.php");

	function saveLocalidadeDb($localidade){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		
		$sqlSalvar = 'insert into localidade
		(cidade, endereco, numero)
		values
		("'.$localidade[0].'","'.$localidade[1].'","'.$localidade[2].'")';

		$last_id = 0;
		$conn->query($sqlSalvar);
		if($conn->errorInfo()[0] === "00000"){
			$last_id = $conn->lastInsertId();
		} else {
			echo $conn->errorInfo()[2];
		}
		
		close_connection($conn);
		
		return $last_id;
	}
	
	function getLocalidadeDb($idLocalidade){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from localidade where id_localidade = '.$idLocalidade;
		$localidade = $conn->query($sqlConsulta);
		$retorno = array();
		while ($row = $localidade->fetch()) {
				$retorno[] = $row;
		}
		
		close_connection($conn);
		return $retorno;
	}
	
	
?>