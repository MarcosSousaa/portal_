<h3><center>Usuários - Adicionar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="name">Nome</label>
            <input type="text" name="name" required="" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="user">Usuario</label>
            <input type="text" name="user" class="form-control" required>
        </div>

        <div class="form-group col-md-4">
            <label for="pass">Senha</label>
            <input type="password" name="pass" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="group">Grupo de Permissão</label>
            <select name="group" id="group" required class="form-control">
                <?php foreach ($group_list as $group) : ?>
                    <option value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="submit" value="Adicionar" class="btn btn-primary">
    <a href="<?php echo BASE_URL;?>/users" class="btn btn-info">VOLTAR</a>

</form>