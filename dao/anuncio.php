<?php 
	require_once __DIR__."/../db/db_connnection.php";

	function saveAnuncioDb($anuncio){
		$conn = OpenCon();
		
		$sqlSalvar = 'insert into usuario_produto
		(local_retirada, local_entrega, id_usuario, id_produto, dt_cadastro, valor_dia, dt_inicio_disp, dt_fim_disp)
		values
		('.$anuncio["id_localidade"].','.$anuncio["id_localidade"].','.$anuncio["id_usuario"].','.$anuncio["idCarro"].', CURDATE(),'.$anuncio["preco"].',"'.$anuncio["dataInicio"].'","'.$anuncio["dataFim"].'")';
		
		if($conn->query($sqlSalvar) === TRUE){
			
		} else {
			echo $conn->error;
		}
		
		CloseCon($conn);
	}
	
	function getAnunciosDb($idUsuario){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from usuario_produto where id_usuario = '.$idUsuario;
		$anuncios = $conn->query($sqlConsulta);
		$retorno = array();
		if (isset($anuncios) && $anuncios != null && is_object($anuncios) && $anuncios->num_rows > 0) {
			while($row = mysqli_fetch_array($anuncios, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}
	
	function getAnuncioDb($idAnuncio){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'select * from usuario_produto where id_usuario_produto = '.$idAnuncio;
		$anuncio = $conn->query($sqlConsulta);
		$retorno = array();
		if (isset($anuncio) && $anuncio != null && is_object($anuncio) && $anuncio->num_rows > 0) {
			while($row = mysqli_fetch_array($anuncio, MYSQLI_ASSOC)) {
				$retorno[] = $row;
			}
		}
		
		CloseCon($conn);
		return $retorno;
	}

	function getAnunciosRangeDataDb($dataInicio, $dataFim){
		$conn = OpenCon();
		$retorno = "";
		$sqlConsulta = 'SELECT * FROM `usuario_produto` WHERE `dt_inicio_disp` between "'.$dataInicio.'" AND "'.$dataFim.'"';
		$anuncios = $conn->query($sqlConsulta);
		$retorno = array();
		while($row = mysqli_fetch_array($anuncios, MYSQLI_ASSOC)) {
			$retorno[] = $row;
		}
		CloseCon($conn);
		return $retorno;
	}

?>