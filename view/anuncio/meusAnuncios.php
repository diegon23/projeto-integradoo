<!DOCTYPE html>
<html lang="en">
    
<?php
  session_start();
  $usuario = $_SESSION["user"][0];
	  require_once __DIR__."/../../model/anuncio.php";
	  require_once __DIR__."/../../model/localidade.php";
	  require_once __DIR__."/../../model/carroModel.php";
    require_once __DIR__."/../../model/aluguel.php";
    require_once __DIR__."/../../model/cadastro.php";
    
?>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Meu Carro, Seu Carro - Cadastrar Carros</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
      <link rel="stylesheet" href="form.css" >
      <script src="form.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>

  <script>
    function cancelar($id){
      window.location.href = "../../controller/anuncioController.php?idAluguel="+$id.id;
    };

    function downloadPdf(){
      window.location.href = "downloadPdf.php";
    };
  </script>
	<style>
	

body
{
  background-color:#f5f5f5;
}
.imagePreview {
	width: 100%;
	height: 20%;
	background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
	background-size: cover;
  background-repeat:no-repeat;
	display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
  margin-left:-1%;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
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

.navbar-brand {
  padding: 0px; /* firefox bug fix */
}

.navbar-brand>img {
  height: 100%;
}
	
</style>

<body >
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
      <a class="navbar-brand" href="home.php" alt="">
      <img src="../../logo.jpg">
    </a>
			</div>
                            
        <ul class="nav navbar-nav">
        <li><a href="home.php">Procurar anúncios</a></li>
        <li class="active"><a href="meusAnuncios.php">Minhas Reservas</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li class="active"><a href="../../index.php">Sair</a></li>
        </ul>
		  </div>
		</nav>
  <h3>Meus Anúncios</h3>


<?php
	$alugueis = getAluguelLocatario($usuario["id_usuario"]);
	foreach($alugueis as $aluguel){
		//buscar produto
    $aluguel['produto'] = getCarro($aluguel['id_produto']);
    $usuarioLocador = getUserId($aluguel['produto'][0]['id_usuario']);
		echo '
		<div class="col-md-2 column productbox">
		  <img src="'.$aluguel['produto'][0]['foto'].'" class="img-responsive">
      <div class="producttitle">'.$aluguel['produto'][0]['modelo'].' - '.$aluguel['produto'][0]['cor'].'
      </div>
      <div class="producttitle">'.$aluguel['status'].' <div class="producttitle pull-right">'.$usuarioLocador[0]['telefone'].'</div>
      </div> 
      
      <div onclick="downloadPdf()" style="background: rgba(50, 200, 150, 1); color: white" class="producttitle">Baixar Contrato</div>
      <div id="'.$aluguel['id_aluguel'].'" onclick="cancelar(this)" style="background: rgba(242, 38, 19, 1); color: white" class="producttitle">CANCELAR</div>
      
		</div>';
	}
?>
    

</div>
    </body>
</html>

