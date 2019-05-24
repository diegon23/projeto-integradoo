<!DOCTYPE html>
<html lang="en">
<?php
	require_once __DIR__."/../../model/anuncio.php";
	session_start();
	$usuario = $_SESSION["user"][0];
?>

<head>
  <title>Meu Carro, Seu Carro - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
.productbox {
    background-color:#ffffff;
	padding:10px;
	margin-bottom:10px;
	-webkit-box-shadow: 0 8px 6px -6px  #999;
	   -moz-box-shadow: 0 8px 6px -6px  #999;
	        box-shadow: 0 8px 6px -6px #999;
}

.producttitle {
    font-weight:bold;
	padding:5px 0 5px 0;
}

.productprice {
	border-top:1px solid #dadada;
	padding-top:5px;
}

.pricetext {
	font-weight:bold;
	font-size:1.4em;
}
</style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Meu Carro, Seu Carro</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Meus anúncios</a></li>
      <li><a href="#">Perfil</a></li>
      <li><a href="carros.html">Cadastrar Carros</a></li>
      <li><a href="cadastrarAnuncio.php">Cadastrar Anúncio</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Meus Anúncios</h3>

<div class="col-md-2 column productbox">
<?php
	$anuncios = getAnuncios($usuario["id_usuario"]);
	foreach($anuncios as $anuncio){
		var_dump($anuncio);
	} 
	die;
	
?>
    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-responsive">
    <div class="producttitle">Product 1</div>
    <div class="productprice"><div class="pull-right"><a href="#" class="btn btn-danger btn-sm" role="button">BUY</a></div><div class="pricetext">£8.95</div></div>
</div>
</div>

</body>
</html>