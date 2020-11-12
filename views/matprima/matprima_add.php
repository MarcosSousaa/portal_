<h3><center>Materia Prima - Adicionar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="operador">Materia Prima</label>
    		<input type="text" name="descricao" required="" placeholder="INFORME O NOME DA MATERIA PRIMA"  class="form-control">
		</div>
        <div class="form-group col-md-6">
			<label for="operador">Fornecedor</label>
    		<input type="text" name="fornecedor" required="" placeholder="INFORME O NOME DO FORNECEDOR"  class="form-control">
		</div>
	</div>    
    <input type="submit" value="Adicionar" class="btn btn-primary">
    <a href="<?php echo BASE_URL;?>/matprima" class="btn btn-info">VOLTAR</a>

</form>