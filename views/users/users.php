<h3><center>Usuários</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/users/add">Adicionar Usuário</a>
<hr>
<table class="table table-striped table-bordered display nowrap" id="tabelaUsuarios" style="width: 100%;">
    <thead>
        <tr>        
            <th>Nome</th>
            <th>Grupo de Permissão</th>
            <th>Status</th>
            <th width="160">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users_list as $us): ?>
            <tr>
                <td><?= $us['name'] ?></td>
                <td><?= $us['group_name'] ?></td>
                <td><?= $status[$us['status']] ?></td>
                <td>
                    <?php 
                        if($usuario_edit) {
                     ?>
                    <a class="btn btn-warning" title="Editar" href="<?= BASE_URL ?>/users/edit/<?= $us['id'] ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" title="Apagar" href="<?= BASE_URL ?>/users/delete/<?= $us['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')"><i class="fa fa-trash"></i></a>
                     <a class="btn btn-success" title="Resetar Senha" href="<?= BASE_URL ?>/users/reset/<?= $us['id'] ?>" onclick="return confirm('Tem certeza que deseja resetar a senha do usuario ?')"><i class="fa fa-refresh"></i></a>

                     <?php 

                        }else{                            
                      ?>
                        <a class="btn btn-success" title="Resetar Senha" href="<?= BASE_URL ?>/users/reset/<?= $us['id'] ?>" onclick="return confirm('Tem certeza que deseja resetar a senha do usuario ?')"><i class="fa fa-refresh"></i></a>
                        <?php 
                            }
                         ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>