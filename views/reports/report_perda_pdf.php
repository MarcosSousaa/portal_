<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
 
<fieldset style="font-weight: bold; color:blue;">
    <?php
    if (isset($filters['perda_data_inicial']) && !empty($filters['perda_data_inicial']) && ($filters['perda_data_final']) && !empty($filters['perda_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['perda_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['perda_data_final']))."<br>";
    }
    if (isset($filters['turno']) && !empty($filters['turno'])) {
        echo "Turno: = " . $turno[$filters['turno']] . "<br>";
    }
   
    ?>

</fieldset>
<br />

<table class="table table-striped">
    <thead>
        <tr>
            <th>Data</th>
            <th>Turno</th>   
            <th>Setor</th> 
            <th>Maquina</th>            
            <th>Produto</th>
            <th>Apara</th>                               
            <th>Refile</th>
            <th>Borra</th>
            <th>Acabamento</th>
            <th>Qtd Parada.</th>
            <th>Tempo Parada</th>
            <th>OC</th>            

        </tr>
    </thead>
    <tbody>            
    <?php foreach ($perda_list as $perda_item): ?>
        <tr>
            <td><?= date('d/m/Y', strtotime($perda_item['data_perd']));?></td>
            <td><?= $turno[$perda_item['turno']]; ?></td>
            <td><?= $departamento[$perda_item['departamento']]; ?></td>
            <td><?= $maquina[$perda_item['maquina']]; ?></td>
            <td><?= $produto[$perda_item['produto']]; ?></td>                
            <td><?= number_format($perda_item['apara'],3,',','.');?>
            </td>
            <td><?= number_format($perda_item['refile'],3,',','.');?>
            </td>
            <td><?= number_format($perda_item['borra'],3,',','.');?>
            </td>
            <td><?= number_format($perda_item['acabamento'],3,',','.');?>
            </td>
            <td><?= $perda_item['qtdparada'];?></td>
            <td><?= $perda_item['tempoparada'];?></td>
            <td><?= $perda_item['oc'];?></td>
            <?php 
                $apara = $apara + $perda_item['apara'];
                $refile = $refile + $perda_item['refile'];
                $borra = $borra + $perda_item['borra'];
                $acabamento = $acabamento + $perda_item['acabamento'];                    
            ?>
        </tr>
    <?php endforeach; ?>                        
    </tbody>
</table>
<h3>Total Apara - <?= number_format($apara,3,',','.'); ?></h3>
<h3>Total Refile - <?= number_format($refile,3,',','.'); ?></h3>
<h3>Total Borra - <?= number_format($borra,3,',','.'); ?></h3>
<h3>Total Acabamento - <?= number_format($acabamento,3,',','.'); ?></h3>



