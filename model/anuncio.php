<?php
	require_once __DIR__."/../dao/anuncio.php";
	
	function saveAnuncio($anuncio){
		$anuncio['dt_inicio_disp'] = implode('-', array_reverse(explode('/', $anuncio['dt_inicio_disp'])));
		$anuncio['dt_fim_disp'] = implode('-', array_reverse(explode('/', $anuncio['dt_fim_disp'])));
		saveAnuncioDb($anuncio);
	}
	
	function getAnuncios($idUsuario){
		$anuncios =  getAnunciosDb($idUsuario);
		foreach($anuncios as $anuncio){
			$anuncio['dt_inicio_disp'] = implode('/', array_reverse(explode('-', $anuncio['dt_inicio_disp'])));
			$anuncio['dt_fim_disp'] = implode('/', array_reverse(explode('-', $anuncio['dt_fim_disp'])));
		}
		
		return $anuncios;
	}

	function getAnunciosRangeData($dataInicio, $dataFim){
		$dataInicio = implode('-', array_reverse(explode('/', $dataInicio)));
		$dataFim = implode('-', array_reverse(explode('/', $dataFim)));
		
		$anuncios = getAnunciosRangeDataDb($dataInicio, $dataFim);
		
		foreach($anuncios as $anuncio){
			$anuncio['dt_inicio_disp'] = implode('/', array_reverse(explode('-', $anuncio['dt_inicio_disp'])));
			$anuncio['dt_fim_disp'] = implode('/', array_reverse(explode('-', $anuncio['dt_fim_disp'])));
		}
		
		return $anuncios;
	}
	
?>