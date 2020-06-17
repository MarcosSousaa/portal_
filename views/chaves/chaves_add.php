<h1><center>Chaves - Adicionar</center></h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="cod">Cod. Interno da Chave</label><br>
    		<input type="text" name="cod" required="" placeholder="INFORME O CODIGO INTERNO DA CHAVE" class="form-control">	
		</div>
		<div class="form-group col-md-4">
			<label for="local">Local da Chave</label>
    		<input type="text" name="local" required="" placeholder="INFORME O LOCAL DA CHAVE" class="form-control">		
		</div>
	</div>    
    <input type="submit" value="Adicionar" class="btn btn-primary">
    <a href="<?php echo BASE_URL;?>/chaves" class="btn btn-info">VOLTAR</a>

</form>