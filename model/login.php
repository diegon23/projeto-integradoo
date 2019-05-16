<?php
	include_once("../dao/usuario.php");
	
	function authenticate($user){
		$cpf = $user['login'];
		
		$senha = encrypt($user['senha']);
		
		return getUserDb($cpf, $senha);
	}
	
	function encrypt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
		return( $qEncoded );
	}
?>