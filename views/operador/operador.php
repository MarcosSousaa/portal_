<h3><center>Operador</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/operador/add">Adicionar Operador</a>
<hr>
<table classs="table table-striped table-bordered display nowrap" id="tabelaOperador" style="width: 100%;">
    <thead>
        <tr>        
            <th>Nome Operador</th> 
            <th>Status</th>       
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($operador_list as $op): ?>
        <tr>
            <td><?= $op['operador'] ?></td>
            <td><?= $status[$op['status']] ?></td>            
            <td>
                <a class="btn btn-primary" href="<?= BASE_URL ?>/operador/view/<?= $op['id'] ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-warning" href="<?= BASE_URL ?>/operador/edit/<?= $op['id'] ?>"><i class="fa fa-edit"></i></a>                
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

