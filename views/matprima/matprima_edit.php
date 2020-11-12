<h3><center>Materia Prima - Editar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="operador">Descrição</label>
    		<input type="text" name="descricao" required="" value="<?= $matprima_info['descricao']; ?>"  class="form-control">
		</div>
        <div class="form-group col-md-6">
			<label for="operador">Fornecedor</label>
    		<input type="text" name="fornecedor" required="" value="<?= $matprima_info['fornecedor']; ?>"  class="form-control">
		</div>
		 <div class="form-group col-md-4">
            <label for="turno">Status</label><br>
            <input type="radio" name="status" value="1" <?= ($matprima_info['status'] == '1') ? 'checked="checked"' : '' ?> />Ativo
            <input type="radio" name="status" value="0" <?= ($matprima_info['status'] == '0') ? 'checked="checked"' : '' ?> />Inativo
        </div>
	</div>    
    <input type="submit" value="Atualizar" class="btn btn-primary">
    <a href="<?php echo BASE_URL;?>/matprima" class="btn btn-info">VOLTAR</a>

</form>