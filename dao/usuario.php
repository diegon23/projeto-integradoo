<?php 
	include_once("../db/db_connnection.php");

	function saveUserDb($user){
		$conn = OpenCon();
		
		sqlSalvar = "insert into usuario(id_usuario, id_tipo, nome, dt_cadastro, cpf, telefone, senha, id_conta_corrente, id_dados_pagamento, email) values ()";
		
		CloseCon($conn);
	}

?>