<h3><center>Permissões - Adicionar Grupo de Permissões</center></h3>
<form method="POST">
    
        <div class="form-group col-xs-4">
            <label for="name">Nome do Grupo</label>
            <input type="text" name="name" class="form-control">
        </div>    
    <hr>  
    <fieldset>
        <legend><center>Permissões</center></legend>
        <div class="col-xs-4">
            <?php foreach ($permissions_list as $p): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="permissions[]" value="<?= $p['id'] ?>" id="p_<?= $p['id'] ?>">
                    <label for="p_<?= $p['id'] ?>" class="form-check-label"><?= $p['descricao'] ?></label>    
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>
    <hr>
    <fieldset>
        <legend><center>Menu</center></legend>
        <div class="col-xs-4">
            <?php foreach ($menu_list as $m): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="menu[]" value="<?= $m['id'] ?>" id="m_<?= $m['id'] ?>">
                    <label for="m_<?= $m['id'] ?>" class="form-check-label"><?= $m['descricao'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>
    <hr>    
     <fieldset>
        <legend><center>Card Home</center></legend>
        <div class="col-xs-4">
            <?php foreach ($card_list_home as $c): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="card_c[]" value="<?= $c['id'] ?>" id="c_<?= $c['id'] ?>">
                    <label for="c_<?= $c['id'] ?>" class="form-check-label"><?= $c['titulo'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>
    <hr>    
     <fieldset>
        <legend><center>Card Relatorios</center></legend>
        <div class="col-xs-4">
            <?php foreach ($card_list_reports as $r): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="card_r[]" value="<?= $r['id'] ?>" id="r_<?= $r['id'] ?>">
                    <label for="r_<?= $r['id'] ?>" class="form-check-label"><?= $r['titulo'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>
     <hr>    
     <fieldset>
        <legend><center>Card Graficos</center></legend>
        <div class="col-xs-4">
            <?php foreach ($card_list_graphics as $g): ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="card_g[]" value="<?= $g['id'] ?>" id="g_<?= $g['id'] ?>">
                    <label for="g_<?= $g['id'] ?>" class="form-check-label"><?= $g['titulo'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>
    
    <br>
    <div class="form-row">
        <input type="submit" value="Adicionar" class="btn btn-primary">&nbsp;&nbsp;&nbsp;
        <a href="<?php echo BASE_URL;?>/permissions" class="btn btn-info">VOLTAR</a> 
    </div>
</form>