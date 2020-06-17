
<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
 
<fieldset style="font-weight: bold; color:blue;">
    <?php
    if (isset($filters['producao_data_inicial']) && !empty($filters['producao_data_inicial']) && ($filters['producao_data_final']) && !empty($filters['producao_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['producao_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['producao_data_final']))."<br>";
    }
   if (isset($filters['lote']) && !empty($filters['lote'])) {
        echo "Lote Interno: = " . $filters['lote'] . "<br>";
    }
   if (isset($filters['pedido']) && !empty($filters['pedido'])) {
        echo "Nº Pedido: = " . $filters['pedido'] . "<br>";
    }
   if (isset($filters['turno']) && !empty($filters['turno'])) {
        echo "Turno: = " . $turno[$filters['turno']] . "<br>";
    }
    if (isset($filters['ext']) && !empty($filters['ext'])) {
        echo "Extrusora Escolhida: = " . $filters['ext'] . "<br>";
    }
    ?>

</fieldset>
<br />

<table class="table table-striped">
    <thead>
        <tr>
            <th>Data Iniciada</th>
            <th>Extrusora</th>                               
            <th>Operador</th>
            <th>Turno</th>            
            <th>Lote</th>                               
            <th>Pedido</th>
            <th>Ordem</th>
            <th>Peso Bob.</th>
            <th>Qtd Prod.</th>
            <th>Total</th>
            <th>Larg</th>
            <th>Esp</th>
            <th>Metrag</th>
            <th>Data Finalizada</th>            

        </tr>
    </thead>            
    <tbody>
    <?php foreach ($producao_list as $producao_item): ?>
        
            <tr>
                <td><?= date('d/m/Y', strtotime($producao_item['data_prod'])).' - '.$producao_item['hri']?></td>
                <td><?= $producao_item['extrusora']?></td>
                <td><?= $producao_item['operador']?></td>
                <td><?= $turno[$producao_item['turno']] ?></td>
                <td><?= $producao_item['lote']?></td>
                <td><?= $producao_item['pedido']?></td>
                <td><?= $producao_item['ordem']?></td>   
                <td><?= number_format($producao_item['pesobob'],3,',','.')?></td>
                <td><?= $producao_item['qtdbob']?></td>
                <td><?= number_format($producao_item['totalbob'],3,',','.')?></td>
                <td><?= $producao_item['larg']?></td>
                <td><?= $producao_item['esp']?></td>
                <td><?= $producao_item['metrag']?></td>
                <td><?= date('d/m/Y', strtotime($producao_item['data_f'])).' - '.$producao_item['hrf']?></td>
                <?php 
                    $totalbob = $totalbob + $producao_item['pesobob'];
                    $totalqtd = $totalqtd + $producao_item['qtdbob'];
                    $totalgeral = $totalgeral + $producao_item['totalbob'];
                ?>
            </tr>
        <?php endforeach; ?>                        
        </tbody>
</table>
<h3>Quantidade Total de BOB Produzida - <?= $totalqtd ?> UN</h3>
<h3>Total Geral Produzido- <?= number_format($totalgeral,3,',','.') ?> KG</h3>

