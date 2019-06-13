<?php 
	require_once __DIR__."/../dao/usuario.php";
	
	function saveUser($user){
		$user['nome'] = $user['primeiro_nome'].' '.$user['ultimo_nome'];
		$user['telefone'] = $user['ddd'].$user['telefone'];
		$user['senha'] = encrypt($user['senha']);
		saveUserDb($user);
	}
	
	function existeUsuarioModel($user){
		if(isset($user['cpf'])){
			return existeUsuarioCpfEmailTipo($user['cpf'], $user['email'], $user['tipo_usuario']);
		} else {
			return existeUsuarioCpfEmailTipo('', $user['email'], '');
		}
	}
	
	function enviarEmail($email){
		$user = getUserDbEmail($email);
		
		$message = "<html><body>Usuário:".$user['cpf']."</br> Senha:".$user['senha']."</body></html> ";

		$message = wordwrap($message, 70);

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To:'.$email. '\r\n';
		$headers .= 'From: no-reply<no-reply@teste.com>' . "\r\n";
		
		return $mail = mail($email, 'Esqueci Minha Senha', $message, $headers);
	}
	
	function getUserId($idUsuario){
		return getUserIdDb($idUsuario);
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


?>