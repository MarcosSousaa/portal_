<h3><center>Chaves</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/chaves/add">Adicionar Chaves</a>
<table width="100%" class="table table-striped paginated">
    <thead>
        <tr>        
            <th>Codígo da Chave</th>        
            <th>Local Chave</th>        
            <th>Status da Chave</th>
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($chaves_list as $c): ?>
            <tr>            
                <td><?= $c['cod'] ?></td>
                <td><?= $c['local'] ?></td>
                <td><?= ($c['status'] == 'A'? 'Ativo' : 'Inativo'); ?></td>            
                <td>
                    <a class="btn btn-primary" href="<?= BASE_URL ?>/chaves/view/<?= $c['id'] ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning" href="<?= BASE_URL ?>/chaves/edit/<?= $c['id'] ?>"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!--<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_veiculos.js"></script> -->
