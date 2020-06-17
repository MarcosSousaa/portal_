<h3 align="center">Limpeza - Visualizar</h3><br>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<?php 
 
?>
<h4>
    <strong style="color:blue;">Data Limpeza: - </strong> <?php echo date('d/m/Y', strtotime($limpeza_info['data_limp'])); ?>
    - <strong style="color:blue;">Horario Limpeza: - </strong> <?= $limpeza_info['hrlimp']; ?>
</h4>
<h4><strong style="color:blue;">Departamento: - </strong> <?= $departamento[$limpeza_info['departamento']] ; ?>
	<strong style="color:blue;">Maquina Limpa: - </strong> <?= $maquina[$limpeza_info['maquina']] ; ?>
     <strong style="color:blue;"> Nome Operador: - </strong> <?= $limpeza_info['operador'] ;?>
    
</h4>
<h4><strong style="color:blue;">Estrutura: - </strong><?= ($limpeza_info['estrutura'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    <strong style="color:blue;">Proteção: - </strong> <?= ($limpeza_info['protecao'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    <strong style="color:blue;">Painel: - </strong><?= ($limpeza_info['painel'] == '1') ? 'Conforme' : 'Não Conforme' ;?> <br>
    <strong style="color:blue;">Chão: - </strong><?= ($limpeza_info['chao'] == '1') ? 'Conforme' : 'Não Conforme' ;?>
</h4>
<h4>
    <strong style="color:blue;">Produtos Utilizados: - </strong><?=$limpeza_info['prod']?> <br>    
</h4>
<h4>
    <strong style="color:blue;">Situação Aprovação Qualidade: - </strong><?= $limpeza_info['aprovacao']; ?><br>
    <strong style="color:blue;">Observação: - </strong><?= $limpeza_info['obs']; ?>
</h4>
<br><br>
<a class="btn btn-info" href="<?= BASE_URL?>/limpeza">VOLTAR</a>

