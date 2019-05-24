<?php 
	include_once("../db/db_connnection.php");

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
	
	
?>