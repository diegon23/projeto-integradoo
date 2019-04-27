<?php
	include_once("../model/cadastro.php");  
 
	$dados = $_POST;
	
	saveUser($dados);
	
?>