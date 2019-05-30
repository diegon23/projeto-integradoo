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


<?php
	$anuncios = getAnuncios($usuario["id_usuario"]);
	foreach($anuncios as $anuncio){
		//buscar localidade
		$anuncio['localidade'] = getLocalidade($anuncio['local_retirada']);
		//buscar produto
		$anuncio['produto'] = getCarro($anuncio['id_produto']);
		
		$anuncio['aluguel'] = getAluguelProduto($anuncio['id_produto']);
		
		if($anuncio['aluguel'] != null && sizeof($anuncio['aluguel']) > 0){
			$texto = "<p style='background: rgba(242, 38, 19, 1)'>Indisponível</p>";
		} else {
			$texto = "<p style='background: rgba(0, 230, 64, 1);'>Disponível</p>";
		}
		
		echo '
		<div class="col-md-2 column productbox">
		<img src="'.$anuncio['produto'][0]['foto'].'" class="img-responsive">
		<div class="producttitle">'.$anuncio['produto'][0]['modelo'].'</div>
		<div class="productprice"><div class="pull-right">'.$texto.'</div><div class="pricetext">R$'.$anuncio['valor_dia'].'</div></div>
		</div>';
	}
?>
    

</div>

</body>
</html>