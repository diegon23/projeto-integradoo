<!DOCTYPE html>
<?php
	require_once __DIR__."\..\..\model\carroModel.php";
	session_start();
	$usuario = $_SESSION["user"][0]["id_usuario"];
	
	$carros = getCarrosUsuario($usuario);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Meu carro, Seu Carro - Cadastrar Anúncio</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="form.css" >
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="form.js"></script>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
	<style>
	

body
{
  background-color:#f5f5f5;
}
.imagePreview {
	width: 100%;
	height: 180px;
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

.dropdown-menu-center {
  left: 50% !important;
  right: auto !important;
  text-align: center !important;
  transform: translate(-50%, 0) !important;
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
	<script>
    $(document).ready(function(){
      var date_input=$('input[name="dataInicio"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	  
	  
	  var date_input=$('input[name="dataFim"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	  
	  $('.dropdown-menu li').click(function()
                   {
					   $('#idCarro').val(this.value);
                   });
	  
    })
	
	function validarEndereco($endereco){
		var $enderecoCompleto = $endereco.value.split(',');
		if($enderecoCompleto.length != 3){
			alert("Endereço informado de forma incorreta, deve possuir os três dados solicitados!");
			document.getElementById('local').value = "";
			return false;
		}
		
		if(isNaN($enderecoCompleto[2])){
			alert("O número do endereço só pode conter números inteiros!");
			document.getElementById('local').value = "";
			return false;
		}
		
	}
</script>
    <body >
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">Meu carro, Seu carro</a>
			</div>
			<ul class="nav navbar-nav">
			  <li><a href="homeLocador.html">Meus anúncios</a></li>
			  <li><a href="#">Perfil</a></li>
			  <li><a href="carros.html">Cadastrar Carros</a></li>
			  <li class="active"><a href="cadastrarAnuncio.php">Cadastrar Anúncio</a></li>
			</ul>
		  </div>
		</nav>
        <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <h2 style="text-align:center">Salvar Carro</h2>
                    <form role="form" method="post" action="../../controller/anuncioController.php">
                        <input type="hidden" name="idCarro" id="idCarro">
                        <div class="row">
							<div class="dropdown" style="text-align: -webkit-center; padding: 2%">
								<button required class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="botaoDropdown">Escolha o carro
								<span class="caret"></span></button>
								<ul class="dropdown-menu dropdown-menu-center">
								  <?php
									foreach($carros as $carro){
										echo '<li value="'.$carro["id_produto"].'"><a>'.$carro["modelo"]. ' - '.$carro["cor"].'</a></li>';
									}
								  ?>
								</ul>
							</div>
						</div>
						<div class="row form-inline" style="margin-left:20%; margin-top: 7%"> 
							<label for="preco" class="col-sm-6 col-form-label col-form-label-sm text-left justify-content-start">
							  Preço da diária:
							</label>
							<input required type="number" style="margin-left:-15%; margin-bottom:3%" class="col-sm-8 form-control" id="preco" name="preco">
						</div>
						<div class="row" style="margin-left:10%"> 
							<label style="margin-left:0%" for="local" class="col-sm-12 col-form-label col-form-label-sm text-left justify-content-start">
							  Local de retirada/devolução:
							</label>
							</br>(cidade, endereço e número, separados por vírgula)
							<input required style="margin-left:-5%; margin-bottom: 5%" onchange="validarEndereco(this)" type="text" class="col-sm-4 form-control" id="local" name="local">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="dataInicio">Data Início</label>
							<input class="form-control" id="dataInicio" name="dataInicio" placeholder="DD/MM/AAAA" type="text"/>
						</div>
						<div class="form-group">
							<label class="control-label" for="dataFim">Data Fim</label>
							<input class="form-control" id="dataFim" name="dataFim" placeholder="DD/MM/AAAA" type="text"/>
						</div>
						
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </body>
</html>

