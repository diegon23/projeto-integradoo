<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Seu Carro, Meu Carro - Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
    .navbar-header{
      margin-left:5px;
      width:100%;
    }
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
	
    <form action="controller/loginController.php" method="POST">
        <h2 class="text-center">Entrar</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name = "login" placeholder="Seu CPF..." required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name = "senha" required="required" placeholder="Sua Senha...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox">Lembrar de mim</label>
            <a href="view/senha/esqueci-senha.html" class="pull-right">Esqueci Minha Senha</a>
        </div>        
    </form>
    <p class="text-center"><a href="view/cadastro/cadastro.html">Cadastrar-se</a></p>
    <h3 class="text-center"><a href="index.php">Visualizar Anúncios</a></h3>
	<?php if(isset($_GET['mensagem'])){ 
		echo '<p style= "color: red" class="text-center">'.$_GET['mensagem'].'</p>';
	}?>
</div>
</body>
</html>                                		                            