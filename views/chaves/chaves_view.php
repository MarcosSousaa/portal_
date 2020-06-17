<h1><center>Chaves - Visualizar</center></h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="cod">Cod. Interno da Chave</label><br>
            <input type="text" name="cod" disabled value="<?php echo $chaves_info['cod'];?>" class="form-control">    
        </div>
        <div class="form-group col-md-4">
            <label for="local">Local da Chave</label>
            <input type="text" name="local" disabled value="<?php echo $chaves_info['local'];?>" class="form-control">        
        </div>
        <div class="form-group col-md-4">
            <label>Status da chave</label><br> 
            <input type="radio" disabled name="status" value="A" <?= ($chaves_info['status'] == 'A') ? 'checked="checked"' : '' ?> />Ativo
            <input type="radio" disabled name="status" value="I" <?= ($chaves_info['status'] == 'I') ? 'checked="checked"' : '' ?> />Inativo
        </div>
    </div>    

    <a class="btn btn-info" href="<?= BASE_URL?>/chaves">VOLTAR</a>

</form>