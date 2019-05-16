<?php 
	include_once("../dao/usuario.php");
	
	function saveUser($user){
		$user['nome'] = $user['primeiro_nome'].' '.$user['ultimo_nome'];
		$user['telefone'] = $user['ddd'].' '.$user['telefone'];
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
	
	
	
	function encrypt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
		return( $qEncoded );
	}

?>