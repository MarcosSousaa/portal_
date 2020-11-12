<h3><center>Materia Prima</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/matprima/add">Adicionar Materia Prima</a>
<hr>
<table classs="table table-striped table-bordered display nowrap" id="tabelaMatPrima" style="width: 100%;">
    <thead>
        <tr>        
            <th>Descrição</th>
            <th>Fornecedor</th>  
            <th>Status</th>       
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($mp_list as $mp): ?>
        <tr>
            <td><?= $mp['descricao'] ?></td>
            <td><?= $mp['fornecedor'] ?></td>
            <td><?= $status[$mp['status']] ?></td>            
            <td>
                <a class="btn btn-primary" href="<?= BASE_URL ?>/matprima/view/<?= $mp['id'] ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-warning" href="<?= BASE_URL ?>/matprima/edit/<?= $mp['id'] ?>"><i class="fa fa-edit"></i></a>                
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

