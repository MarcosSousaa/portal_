<h3><center>Lote Prandi</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/lotepran/add">Adicionar Lote</a>
<hr>

<table classs="table table-striped table-bordered display nowrap" id="tabelaLotePran" style="width: 100%;">
    <thead>
        <tr>        
            <th>Data Iniciada</th>            
            <th>Nº Bob Mãe</th>  
            <th>Turno</th>       
            <th>Operador</th>
            <th>Maquina</th>
            <th>Tipo</th>
            <th>Data Finalizada</th>
            <th>Qtd KG</th>              
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($lp_list as $lp): ?>
        <tr>
            <td><?= date('d/m/Y', strtotime($lp['data_ini'])). '- '. $lp['hr_ini'] ?></td>
            <td><?= $lp['n_bob'] ?></td>
            <td><?= $turno[$lp['turno']] ?></td>
            <td><?= $lp['operador'] ?></td>            
            <td><?= 'Prandi - ' .$lp['maquina'] ?></td>   
            <td><?= $tipo[$lp['tipo']] ?></td>   
            <td><?= date('d/m/Y', strtotime($lp['data_fim'])). '- '. $lp['hr_fim'] ?></td>
            <td><?= number_format($lp['peso'],3,'.',',') ?></td>            
            <td>
                <a class="btn btn-primary" href="<?= BASE_URL ?>/lotepran/view/<?= $lp['id'] ?>"><i class="fa fa-eye"></i></a>                
                <a class="btn btn-danger" href="<?= BASE_URL ?>/lotepran/delete/<?= $lp['id'] ?>" onclick="return confirm('Tem Certeza que deseja excluir esse Registro ?')"><i class="fa fa-trash"></i></a>                
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

