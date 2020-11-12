<h3><center>Materia Prima - Visualizar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="operador">Descrição</label>
    		<input type="text" name="descricao" disabled value="<?= $matprima_info['descricao']; ?>"  class="form-control">
		</div>
        <div class="form-group col-md-6">
			<label for="operador">Fornecedor</label>
    		<input type="text" name="fornecedor" disabled value="<?= $matprima_info['fornecedor']; ?>"  class="form-control">
		</div>
		 <div class="form-group col-md-4">
            <label for="turno">Status</label><br>
            <input disabled type="radio" name="status" value="1" <?= ($matprima_info['status'] == '1') ? 'checked="checked"' : '' ?> />Ativo
            <input disabled type="radio" name="status" value="0" <?= ($matprima_info['status'] == '0') ? 'checked="checked"' : '' ?> />Inativo
        </div>
	</div>        
    <a href="<?php echo BASE_URL;?>/matprima" class="btn btn-info">VOLTAR</a>

</form>