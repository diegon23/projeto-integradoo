<?php 
	include_once("../dao/usuario.php");
	
	function saveUser($user){
		
		$user['nome'] = $user['primeiro_nome'].' '.$user['ultimo_nome'];
		$user['telefone'] = $user['ddd'].' '.$user['telefone'];
		
		saveUserDb($user);
	}
	
	function existeUsuarioModel($user){
		if(isset($user['cpf'])){
			return existeUsuarioCpfEmail($user['cpf'], $user['email']);
		} else {
			return existeUsuarioCpfEmail('', $user['email']);
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

?>