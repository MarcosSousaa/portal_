<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<fieldset style="font-weight: bold; color:blue;">
    <?php
    if (isset($filters['limpeza_data_inicial']) && !empty($filters['limpeza_data_inicial']) && ($filters['limpeza_data_final']) && !empty($filters['limpeza_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['limpeza_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['limpeza_data_final']))."<br>";
    }
   if (isset($filters['dep']) && !empty($filters['dep'])) {
        echo "Departamento: = " . $departamento[$filters['dep']] . "<br>";
    }
   if (isset($filters['maq']) && !empty($filters['maq'])) {
        echo "Maquina: = " . $maquina[$filters['maq']] . "<br>";
    }
   if (isset($filters['operador']) && !empty($filters['operador'])) {
        echo "Nome Operador: = " . $filters['operador'] . "<br>";
    }
    ?>

</fieldset>
<br />

<table class="table table-striped">
    <thead>
        <tr>
            <th>Data Limpeza</th>
            <th>Departamento</th>                               
            <th>Maquina</th>
            <th>Operador</th>            
            <th>Estrutura</th>                               
            <th>Proteção</th>
            <th>Paínel</th>
            <th>Chão</th>
            <th>Aprovação</th>
            <th>Produtos Usados</th>
            <th>Obs</th>            
        </tr>
    </thead>            
    <?php foreach ($limpeza_list as $limpeza_item): ?>
        <?php
        $aprovacao= $limpeza_item['valid'];              
        if($aprovacao != '1' && $aprovacao != '2'){
            $aprovacao = 'Em Analíse Pelo Dep. Qualidade';
        }
        if($aprovacao == '2'){
            $aprovacao = 'Reprovado Pelo Dep. Qualidade';
        }
        if($aprovacao == '1'){
            $aprovacao = 'Aprovado Pelo Dep. Qualidade';
        }

    ?>
        <tbody>
            <tr>
                <td><?= date('d/m/Y', strtotime($limpeza_item['data_limp'])).' - '.$limpeza_item['hrlimp']?></td>
                <td><?= $departamento[$limpeza_item['departamento']]?></td>
                <td><?= $maquina[$limpeza_item['maquina']]?></td>
                <td><?= $limpeza_item['operador'] ?></td>
                <td><?= ($limpeza_item['estrutura'] == '1') ? 'Conforme' : 'Não Conforme';?></td>
                <td><?= ($limpeza_item['protecao'] == '1') ? 'Conforme' : 'Não Conforme';?></td>
                <td><?= ($limpeza_item['painel'] == '1') ? 'Conforme' : 'Não Conforme';?></td>   
                <td><?= ($limpeza_item['chao'] == '1') ? 'Conforme' : 'Não Conforme';?></td>
                <td><?= $aprovacao?></td>
                <td><?= $limpeza_item['prod']?></td>
                <td><?= $limpeza_item['obs']?></td>
            </tr>            
    <?php endforeach; ?>
        
        </tbody>
</table>

