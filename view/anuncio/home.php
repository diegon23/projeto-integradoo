<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Meu carro, Seu Carro</title>
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
    .navbar-header{
      margin-left:5px;
      width:100%;
    }
    .datepicker{
      top: 0px;
    }
</style>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="dataInicio"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	  
	  
	  var date_input=$('input[name="dataFim"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	  
	  $('.dropdown-menu li').click(function()
                   {
					   $('#idCarro').val(this.value);
                   });
	  
    });
</script>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Meu carro, Seu carro</a>
      
      <ul class="nav navbar-nav pull-right">
        <li class="active"><a href="../../login.php">Login</a></li>
      </ul>
    </div>
  </nav>
    
  <form role="form" method="POST" action="exibir.php">
    <div class="container">
      <div class="col-md-6 col-md-offset-3">
        <h2 style="text-align:center">Buscar Anúncio</h2>
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
    </div>
  </form>

</body>
</html>