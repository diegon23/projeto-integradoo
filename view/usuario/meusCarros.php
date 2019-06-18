<!DOCTYPE html>
<html lang="en">
<?php
	require_once __DIR__."/../../model/anuncio.php";
	require_once __DIR__."/../../model/localidade.php";
	require_once __DIR__."/../../model/carroModel.php";
	require_once __DIR__."/../../model/aluguel.php";
	require_once __DIR__."/../../model/cadastro.php";
	session_start();
	$usuario = $_SESSION["user"][0];
?>

<head>
  <title>Meu Carro, Seu Carro</title>
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

.navbar-brand {
	padding: 0px; /* firefox bug fix */
}

.navbar-brand>img {
	height: 100%;
}
</style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
		<a class="navbar-brand" href="#" alt="">
      <img src="../../logo.jpg">
    </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="homeLocador.php">Meus anúncios</a></li>
      <li><a href="carros.html">Cadastrar Carros</a></li>
      <li><a href="cadastrarAnuncio.php">Cadastrar Anúncio</a></li>
      <li class="active"><a href="meusCarros.php">Meus Carros</a></li>
    </ul>
      
		<ul class="nav navbar-nav pull-right">
			<li class="active"><a href="../../index.php">Sair</a></li>
		</ul>
  </div>
</nav>
  
<div class="container">
  <h3>Meus Carros</h3>

<?php
	$carros = getCarrosUsuario($usuario["id_usuario"]);
	foreach($carros as $carro){
		echo '
		<div class="col-md-2 column productbox">
		<img src="'.$carro['foto'].'" class="img-responsive">
		<div class="producttitle">'.$carro['modelo'].' - '.$carro['cor'].' - '.$carro['ano'].'</div>
		</div>';
	}
?>
    

</div>

</body>
</html>