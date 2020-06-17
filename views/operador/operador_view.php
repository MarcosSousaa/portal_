<h3><center>Operador - Visualizar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="operador">Nome Operador</label>
    		<input type="text" name="operador" value="<?= $operador_info['operador']; ?>"  class="form-control" disabled>
		</div>
	</div>        
    <a href="<?php echo BASE_URL;?>/operador" class="btn btn-info">VOLTAR</a>

</form>