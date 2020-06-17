<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alteração de Senha</title>
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
						<label for="newSenha">Nova senha</label>
						<input type="hidden" name="usr" value="<?=$user_new ?>">
	  					<input type="password" class="form-control" placeholder="Nova Senha" aria-label="Nova Senha" aria-describedby="ip-1" name="newSenha" id="newSenha">	
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
	<!--
	<div class="container-md">
		<div class="loginarea">
			<div class="text-center">
				<img src="/assets/images/logo.png" class="responsive-img" height="100px" width="100px"/>			
			</div>			
			<form method="POST">
				<div class="form-group">
					<div class="col-md-12">
						<label for="cpf">Identificação</label>
	  					<input type="text" class="form-control" placeholder="Identificador" aria-label="Identificador" aria-describedby="ip-1" name="cpf" id="cpf">	
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
	-->

	<?php if(isset($error) && !empty($error)) :?>
	<div class="erro">
		<?php echo $error; ?>
	</div>
	<?php endif; ?>
	<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>