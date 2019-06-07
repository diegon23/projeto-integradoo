<!DOCTYPE html>
<html lang="en">
    
<?php
  session_start();
	require_once __DIR__."/../../model/anuncio.php";
	require_once __DIR__."/../../model/localidade.php";
	require_once __DIR__."/../../model/carroModel.php";
    require_once __DIR__."/../../model/aluguel.php";
    $anuncio = getAnuncio($_GET['idAnuncio']);
    $anuncio['localidade'] = getLocalidade($anuncio[0]['local_retirada']);
    //buscar produto
    $anuncio['produto'] = getCarro($anuncio[0]['id_produto']);
    
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
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
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
	
	</style>
	<script>
	
$(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
	$(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});
	
	</script>
    <body >
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="home.php">Meu carro, Seu carro</a>
			</div>
      
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
		</nav>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Detalhes do Anúncio</h2> 
                    <form role="form" method="POST" action="cadastrarAnuncio.php">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="modelo"> Modelo do carro:</label>
                                <input disabled type="text" class="form-control" id="modelo" name="modelo" maxlength="50" value="<?php echo $anuncio['produto'][0]['modelo'];?>">
                                <input type="hidden" class="form-control" id="modelo" name="modelo" maxlength="50" value="<?php echo $anuncio['produto'][0]['modelo'];?>">
                            </div>
						</div>
						<div class="container">
						  <div class="row">
							<div class="col-sm-3 imgUp">
								<div class="imagePreview"><img class="imagePreview" src="<?php echo $anuncio['produto'][0]['foto'];?>"></div>
                <input type="hidden" id="idProduto" name="idProduto" value="<?php echo $anuncio['produto'][0]['id_produto'];?>">
                           
							</div>
							  <i class="fa fa-plus imgAdd"></i>
                            <div class="col-sm-5 form-group">
                                <label for="cor"> Cor:</label>
                                <input disabled type="text" class="form-control" id="cor" name="cor" maxlength="50" value="<?php echo $anuncio['produto'][0]['cor'];?>">
                                <input  type="hidden" class="form-control" id="cor" name="cor" maxlength="50" value="<?php echo $anuncio['produto'][0]['cor'];?>">
                            </div>
                            <div class="col-sm-5 form-group">
                                <label for="ano"> Ano:</label>
                                <input disabled type="text" class="form-control" id="ano" name="ano" maxlength="50" value="<?php echo $anuncio['produto'][0]['ano'];?>">
                                <input  type="hidden" class="form-control" id="ano" name="ano" maxlength="50" value="<?php echo $anuncio['produto'][0]['ano'];?>">
                            </div>
                            <div class="col-sm-5 form-group">
                                <label for="name"> Descrição:</label>
                                <textarea disabled class="form-control" type="textarea" id="descricao" name="descricao"  maxlength="6000" rows="2"><?php echo $anuncio['produto'][0]['produtocol'];?></textarea>
                                <input  class="form-control" type="hidden" id="descricao" name="descricao"  value = "<?php echo $anuncio['produto'][0]['produtocol'];?>">
                            </div>
						</div>
                        </div>
                        <?php 
                        if(isset($_SESSION['user'])) {
                            echo '
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Reservar</button>
                                </div>
                            </div>';
                        }
                        
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

