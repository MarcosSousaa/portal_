<h3><center>Veiculos</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/veiculos/add">Adicionar Veículo</a>

<table width="100%" class="table table-striped paginated">
    <thead>
        <tr>        
            <th>Tipo</th>
            <th>Motorista</th>
            <th>Placa</th>    
            <th>Status</th>                
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($veiculos_list as $v): ?>
            <tr>
                <td><?= $v['tipo'] ?></td>
                <td><?= $v['motorista'] ?></td>
                <td><?= $v['placa'] ?></td>
                <td><?= ($v['status'] == 'A'? 'Ativo' : 'Inativo'); ?></td>      
                <td>
                    <a class="btn btn-primary" href="<?= BASE_URL ?>/veiculos/view/<?= $v['id'] ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning" href="<?= BASE_URL ?>/veiculos/edit/<?= $v['id'] ?>"><i class="fa fa-edit"></i></a>                
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

