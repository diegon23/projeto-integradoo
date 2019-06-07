<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	require_once __DIR__."/../../model/anuncio.php";
	require_once __DIR__."/../../model/localidade.php";
	require_once __DIR__."/../../model/carroModel.php";
	require_once __DIR__."/../../model/aluguel.php";
	require_once __DIR__."/../../model/cadastro.php";
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
.navbar-header{
      margin-left:5px;
      width:100%;
    }

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
<script>
	function exibeAnuncio($id){
		window.location.href = "exibirAnuncio.php?idAnuncio="+$id.id;
	}
</script>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Meu Carro, Seu Carro</a>
      
			<?php 
                        if(isset($_SESSION['user'])) {
                            echo '
                            
			<ul class="nav navbar-nav">
            <li><a href="home.php">Procurar anúncios</a></li>
            <li><a href="meusAnuncios.php">Meus Anuncios</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="../../index.php">Sair</a></li>
            </ul>
                            ';
                        }
 else { echo '
  <ul class="nav navbar-nav pull-right">
  <li class="active"><a href="../../login.php">Login</a></li>
</ul>';
 }                        
                        ?>
    </div>
  </div>
</nav>
  
<div class="container">
  <h2>Anúncios disponíveis</h2>
<?php
	$anuncios = getAnunciosRangeData($_POST["dataInicio"], $_POST["dataFim"]);
	if(!empty($anuncios)){
		foreach($anuncios as $anuncio){
			//buscar localidade
			$anuncio['localidade'] = getLocalidade($anuncio['local_retirada']);
			//buscar produto
			$anuncio['produto'] = getCarro($anuncio['id_produto']);
			$usuarioProduto = getUserId($anuncio['produto'][0]['id_usuario']);
			$anuncio['aluguel'] = getAluguelProduto($anuncio['id_produto']);

			if($anuncio['aluguel'] != null && sizeof($anuncio['aluguel']) > 0){
				$texto = "<p style='background: rgba(242, 38, 19, 1)'>Indisponível</p>";
			} else {
				$texto = "<p style='background: rgba(0, 230, 64, 1);'>Disponível</p>";
			}
			if(!isset($_SESSION['user']) || (
				isset($_SESSION['user']) && $_SESSION['user'][0]["cpf"] != $usuarioProduto[0]['cpf'] 
			) ) {
				echo '
				<div class="col-md-2 column productbox">
					<img src="'.$anuncio['produto'][0]['foto'].'" class="img-responsive">
					<div class="producttitle">'.$anuncio['produto'][0]['modelo'].'</div>';
					if($anuncio['aluguel'] != null && sizeof($anuncio['aluguel']) > 0){
						echo '<div class="productprice"><div class="pull-right">'.$texto.'</div>';
					} else {
						echo '<div class="productprice"><div id = "'.$anuncio['id_usuario_produto'].'" class="pull-right" onclick="exibeAnuncio(this)">Abrir</div>';
					}
					echo '<div class="pricetext">R$'.$anuncio['valor_dia'].'</div></div>
				</div>';
			}
		}
	} else {
			echo '<h3 style="color:red">Nenhum anúncio disponível no período selecionado</h3></br><a href = "home.php">Pesquisar novamente</a>';
	}
?>
    

</div>

</body>
</html>