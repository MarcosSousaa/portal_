<style type="text/css">
    .tab {
        color: #000;
    }
</style>
<h3><center>Permissões</center></h3>
<ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link active tab" href="#">Grupo de Permissões</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tab" href="#">Permissões</a>
        </li>
</ul>
<hr>
<div class="tabbody">
    <?php if($permissions_addgroup) : ?>
    <a class="btn btn-primary" href="<?= BASE_URL ?>/permissions/add_group">Adicionar Grupo de Permissão</a>
    <?php endif; ?>
    <hr>
    <h3><center>Tabela</center></h3>
    <table classs="table table-striped table-bordered display nowrap" id="tabelaGrupo" style="width: 100%;">
        <thead>
            <tr>
                <th>Nome do Grupo de Permissões</th>
                <th width="160">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permission_groups_list as $p): ?>
                <tr>
                    <td><?= $p['name'] ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= BASE_URL ?>/permissions/edit_group/<?= $p['id'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="<?= BASE_URL ?>/permissions/delete_group/<?= $p['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <?php if($permissions_add) { ?>
<div class="tabbody">
    <?php if($permissions_add) : ?>
    <a class="btn btn-primary" href="<?= BASE_URL ?>/permissions/add">Adicionar Permissão</a>
    <?php endif; ?>
    <hr>
    <h3><center>Tabela</center></h3>
    <table classs="table table-striped table-bordered display nowrap" id="tabelaAcesso" style="width: 100%;">
        <thead>
            <tr>
                <th>Nome da Permissão</th>
                <th>Nome Tecnico</th>
                <?php if($permissions_del) : ?>
                <th width="50">Ações</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permission_list as $p): ?>
                <tr>
                    <td><?= $p['descricao'] ?></td>
                    <td><?= $p['name'] ?></td>
                    <?php if($permissions_del) : ?>
                    <td>
                        <a class="btn btn-danger" href="<?= BASE_URL ?>/permissions/delete/<?= $p['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')"><i class="fa fa-trash"></i></a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php }?>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_permissions.js"></script>