<h3><center>Lote Interno</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/loteint/add">Adicionar Lote Interno</a>
<hr>
<table classs="table table-striped table-bordered display nowrap" id="tabelaMatPrima" style="width: 100%;">
    <thead>
        <tr>        
            <th>Data</th>
            <th>Nº Lote</th>  
            <th>Turno</th>       
            <th>Op. Misturador</th>      
            <th>Batidas</th>
            <th>Produto</th>      
            <th>Op. Granulador</th>      
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($li_list as $li): ?>
        <tr>
            <td><?= $li['data'] ?></td>
            <td><?= $li['lote'] ?></td>
            <td><?= $li['misturador'] ?></td>            
            <td><?= $li['batidas'] ?></td>   
            <td><?= $produto[$li['produto']] ?></td>   
            <td><?= $li['granulador'] ?></td>            
            <td>
                <a class="btn btn-primary" href="<?= BASE_URL ?>/loteint/view/<?= $li['id'] ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-warning" href="<?= BASE_URL ?>/loteint/edit/<?= $li['id'] ?>"><i class="fa fa-edit"></i></a>                
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

