<h1><center>Chaves - Editar</center></h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="cod">Cod. Interno da Chave</label><br>
            <input type="text" name="cod" required=""  value="<?php echo $chaves_info['cod'];?>" class="form-control"> 
        </div>
        <div class="form-group col-md-4">
            <label for="local">Local da Chave</label>
            <input type="text" name="local" required="" value="<?php echo $chaves_info['local'];?>" class="form-control">        
        </div>
        <div class="form-group col-md-4">
            <label>Status da chave</label><br> 
            <input type="radio" name="status" value="A" <?= ($chaves_info['status'] == 'A') ? 'checked="checked"' : '' ?> />Ativo
            <input type="radio" name="status" value="I" <?= ($chaves_info['status'] == 'I') ? 'checked="checked"' : '' ?> />Inativo
        </div>
    </div>    
    <input type="submit" value="Atualizar" class="btn btn-primary">
    <a href="<?php echo BASE_URL;?>/chaves" class="btn btn-info">VOLTAR</a>

</form>