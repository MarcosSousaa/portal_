<h1><center>Usuários - Editar</center></h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>

<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="name">Nome</label>
            <input type="text" name="name" value="<?= $user_info['name'] ?>" class="form-control">        
        </div>
        <div class="form-group col-md-4">
            <label for="turno">Usuario</label>
            <input type="text" name="turno" value="<?= $user_info['user'] ?>" class="form-control" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="group">Grupo de Permissão</label>
            <select name="group" id="group" required class="form-control">
                <?php foreach ($group_list as $group) : ?>
                    <option value="<?= $group['id'] ?>" <?= ($group['id'] == $user_info['id_group']) ? 'selected="selected"' : '' ?>>
                    <?= $group['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>    
        </div>
    </div>    
    <input type="submit" value="Editar" class="btn btn-primary">
    <a href="<?php echo BASE_URL;?>/users" class="btn btn-info">VOLTAR</a>

</form>