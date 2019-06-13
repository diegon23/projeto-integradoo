<?php
	$aluguel = $_POST;
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<hr>

<article class="card">
<div class="card-body p-5">

<ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
		<i class="fa fa-credit-card"></i> Cartão de Crédito</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane fade show active" id="nav-tab-card">
	<form role="form" method="POST" action = "cadastrarAnuncio.php">
	<div class="form-group">
		<label for="username">Nome Completo</label>
		<input type="text" class="form-control" name="username" placeholder="" required="">
	<input type="hidden" name="idProduto" value = "<?php echo $aluguel['idProduto']; ?>">
	</div> <!-- form-group.// -->
	<div class="form-group">
		<label for="cardNumber">Número do Cartão</label>
		<div class="input-group">
			<input type="text" class="form-control" name="cardNumber" placeholder="">
		</div>
	</div> <!-- form-group.// -->

	<div class="row">
	    <div class="col-sm-8">
	        <div class="form-group">
	            <label><span class="hidden-xs">Validade</span> </label>
	        	<div class="input-group">
	        		<input type="number" class="form-control" placeholder="MM" name="">
		            <input type="number" class="form-control" placeholder="YY" name="">
	        	</div>
	        </div>
	    </div>
	    <div class="col-sm-4">
	        <div class="form-group">
	            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV</label>
	            <input type="number" class="form-control" required="">
	        </div>
	    </div>
	</div>
	<button class="subscribe btn btn-primary btn-block" type="submit"> Confirmar  </button>
	</form> 
</div> 
</article> <!-- card.// -->
</aside> <!-- col.// -->
</div> <!-- row.// -->

</div>
</article>