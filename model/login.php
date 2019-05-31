<?php
	include_once("../dao/usuario.php");
	
	function authenticate($user){
		$cpf = $user['login'];
		
		$senha = encrypt($user['senha']);
		
		return getUserDb($cpf, $senha);
	}
	
	function encrypt( $string) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);

		return $output;
	}

	function getUserUserId($userId){
		return getUserDbUserId($userId);
	}
?>