<?php 
	require_once __DIR__."/../db/database_functions.php";

	function saveAnuncioDb($anuncio){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		
		$sqlSalvar = 'insert into usuario_produto
		(local_retirada, local_entrega, id_usuario, id_produto, dt_cadastro, valor_dia, dt_inicio_disp, dt_fim_disp)
		values
		('.$anuncio["id_localidade"].','.$anuncio["id_localidade"].','.$anuncio["id_usuario"].','.$anuncio["idCarro"].', CURDATE(),'.$anuncio["preco"].',"'.$anuncio["dataInicio"].'","'.$anuncio["dataFim"].'")';
		$conn->query($sqlSalvar);
		if($conn->errorInfo()[0] === "00000"){
		} else {
			echo $conn->errorInfo()[2];
		}
		
		close_connection($conn);
	}
	
	function getAnunciosDb($idUsuario){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario_produto where id_usuario = '.$idUsuario;
		$anuncios = $conn->query($sqlConsulta);
		$retorno = array();
		while ($row = $anuncios->fetch()) {
				$retorno[] = $row;
		}
		
		close_connection($conn);
		return $retorno;
	}
	
	function getAnuncioDb($idAnuncio){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'select * from usuario_produto where id_usuario_produto = '.$idAnuncio;
		$anuncio = $conn->query($sqlConsulta);
		$retorno = array();
		while ($row = $anuncio->fetch()) {
				$retorno[] = $row;
		}
		
		close_connection($conn);
		return $retorno;
	}

	function getAnunciosRangeDataDb($dataInicio, $dataFim){
		$databasename = "projetointegrado";
		$conn = connect_to_database($databasename);
		$retorno = "";
		$sqlConsulta = 'SELECT * FROM `usuario_produto` WHERE `dt_inicio_disp` between "'.$dataInicio.'" AND "'.$dataFim.'"';
		$anuncios = $conn->query($sqlConsulta);
		$retorno = array();
		while ($row = $anuncios->fetch()) {
			$retorno[] = $row;
		}
		close_connection($conn);
		return $retorno;
	}

?>