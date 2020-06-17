<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= BASE_URL ?>/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/login.css">
</head>
<body>
	
	<div class="container-md">
		<div class="loginarea">
			<div class="text-center">
				<img src="<?= BASE_URL ?>/assets/images/logo.png" class="responsive-img" height="100px" width="100px"/>			
			</div>			
			<form method="POST">
				<div class="form-group">
					<div class="col-md-12">
						<label for="user">Usuario</label>
	  					<input type="text" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="ip-1" name="user" id="user">	
					</div>		
					<div class="col-md-12">
						<label for="pass">Senha</label>
	  					<input type="password" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="ip-2" name="pass" id="pass">	
					</div>		
				</div>
				<div class="form-group row">
    				<div class="col-sm-10">
      					<button type="submit" class="btn btn-danger">Acessar</button>
    				</div>
  				</div>
				
			</form>
			
		</div>	
	</div>	

	<?php if(isset($error) && !empty($error)) :?>
	<div class="erro" style="color:white;font-weight: bold;font-size: 17px;">		
		<div class="alert alert-warning" role="alert" id="text">
  			<?php echo $error; ?>
		</div>
	</div>


	<?php endif; ?>
	<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	var texto = $('#text').length;    	
    	if(texto >= 1 ){
    		setInterval(function(){
    			$('#text').text("");
    			$('#text').hide();
    		},6000)
    	}
    	else {
    		$('#text').show();
    	}
    </script>
</body>
</html>