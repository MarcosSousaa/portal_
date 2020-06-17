<h3><center>Permissões - Editar Grupo de Permissões</center></h3>
<form method="POST">
    <div class="form-group col-xs-4">
        <label for="name">Nome do Grupo</label>
        <input type="text" class="form-control" name="name" value="<?= $group_info['name'] ?>">
    </div>
    <hr>    
    <fieldset>            
        <legend>Permissões</legend>
        <div class="col-xs-4">
            <?php foreach ($permissions_list as $p): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="permissions[]" class="form-check-input" value="<?= $p['id'] ?>" id="p_<?= $p['id'] ?>"
                           <?= (in_array($p['id'], $group_info['params'])) ? 'checked="checked"' : '' ?>/>
                    <label for="p_<?= $p['id'] ?>" class="form-check-label"><?= $p['descricao'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>
    <hr>
    <fieldset>            
        <legend>Menu</legend>
        <div class="col-xs-4">
            <?php foreach ($menu_list as $m): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="menu[]" class="form-check-input" value="<?= $m['id'] ?>" id="m_<?= $m['id'] ?>"
                           <?= (in_array($m['id'], $group_info['menu_acesso'])) ? 'checked="checked"' : '' ?>/>
                    <label for="m_<?= $m['id'] ?>" class="form-check-label"><?= $m['descricao'] ?></label>
                </div>
            <?php endforeach;?>
        </div>

    </fieldset>
    <hr>
    <fieldset>            
        <legend>Card Home</legend>
        <div class="col-xs-4">
            <?php foreach ($card_list_home as $c): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="card_c[]" class="form-check-input" value="<?= $c['id'] ?>" id="c_<?= $c['id'] ?>"
                           <?= (in_array($c['id'], $group_info['card_acesso'])) ? 'checked="checked"' : '' ?>/>
                    <label for="c_<?= $c['id'] ?>" class="form-check-label"><?= $c['titulo'] ?></label>
                </div>
            <?php endforeach;?>
        </div>

    </fieldset>
    <hr>
    <fieldset>            
        <legend>Card Relatorios</legend>
        <div class="col-xs-4">
            <?php foreach ($card_list_reports as $r): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="card_r[]" class="form-check-input" value="<?= $r['id'] ?>" id="r_<?= $r['id'] ?>"
                           <?= (in_array($r['id'], $group_info['card_acesso'])) ? 'checked="checked"' : '' ?>/>
                    <label for="r_<?= $r['id'] ?>" class="form-check-label"><?= $r['titulo'] ?></label>
                </div>
            <?php endforeach;?>
        </div>

    </fieldset>
    <hr>
    <fieldset>            
        <legend>Card Graficos</legend>
        <div class="col-xs-4">
            <?php foreach ($card_list_graphics as $g): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="card_g[]" class="form-check-input" value="<?= $g['id'] ?>" id="g_<?= $g['id'] ?>"
                           <?= (in_array($g['id'], $group_info['card_acesso'])) ? 'checked="checked"' : '' ?>/>
                    <label for="g_<?= $g['id'] ?>" class="form-check-label"><?= $g['titulo'] ?></label>
                </div>
            <?php endforeach;?>
        </div>

    </fieldset>
    <br>
    
        <input type="submit" value="Editar" class="btn btn-primary">
        <a href="<?php echo BASE_URL;?>/permissions" class="btn btn-info">VOLTAR</a>
    
    

</form>