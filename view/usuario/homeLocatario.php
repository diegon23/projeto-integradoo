<!DOCTYPE html>
<html lang="en">
<?php
	require_once __DIR__."/../../model/anuncio.php";
	require_once __DIR__."/../../model/localidade.php";
	require_once __DIR__."/../../model/carroModel.php";
	require_once __DIR__."/../../model/aluguel.php";
	session_start();
	$usuario = $_SESSION["user"][0];
?>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Meu carro, Seu carro</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Anúncios</a></li>
      <li><a href="#">Perfil</a></li>
      <li><a href="#">Minhas Reservas</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Teste</h3>
  <p>Teste</p>
</div>

</body>
</html>