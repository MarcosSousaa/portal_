<link href="<?= BASE_URL ?>/assets/css/producao.css" rel="stylesheet"/>
<h1 align="center">Producao - Visualizar</h1><br>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<div class="painel_model">
	<h4>
	    <strong class="title">Data Produção: - </strong> <?php echo date('d/m/Y', strtotime($producao_info['data_prod'])); ?>
	    - <strong class="title">Início: - </strong> <?= $producao_info['hri']; ?>
	       - <strong class="title">Situação: - </strong> <?= $producao_info['situacaoini']; ?>
	    <br>
	     <strong class="title">Data Finalizada: - </strong> <?php echo date('d/m/Y', strtotime($producao_info['data_f'])); ?>
	    - <strong class="title">Fim: - </strong> <?= $producao_info['hrf']; ?>
	    - <strong class="title">Situação: - </strong> <?= $producao_info['situacaofim']; ?>
	</h4>
	<h4><strong class="title">Nº Extrusora Produzida: - </strong> <?= $producao_info['extrusora'] ; ?>
		<strong class="title">Turno - </strong> <?= $turno[$producao_info['turno']] ; ?>
	     <strong class="title"> Nome Operador: - </strong> <?= $producao_info['operador'] ;?>
	    
	</h4>
	<h4><strong class="title">Pedido: - </strong><?= $producao_info['pedido']; ?> <br>
	    <strong class="title">Ordem: - </strong> <?= $producao_info['ordem']; ?> <br>
	    <strong class="title">Lote Interno: - </strong><?= $producao_info['lote'];?> <br>
	    <strong class="title">Rpm: - </strong><?= $producao_info['rpm'];?>
	</h4>
	<h4><strong class="title">Peso Bob: - </strong><?= number_format($producao_info['pesobob'],3,",","."); ?> <br>
	    <strong class="title">Quantidade Produzida: - </strong> <?= $producao_info['qtdbob']; ?> <br>
	    <strong class="title">Total Produzida: - </strong><?= number_format($producao_info['totalbob'],3,",",".");?> <br>
	    <strong class="title">Largura: - </strong><?= $producao_info['larg'];?>
	    <strong class="title">Espessura: - </strong><?= $producao_info['esp'];?> 
	    <strong class="title">Metragem: - </strong><?= $producao_info['metrag'];?> <br>	    
	</h4>
	<h4>
		<strong class="title">Sobra Bob Quantidade - </strong><?= (isset($producao_info['perdabob'])) ? $producao_info['perdabob'] : 'Sem Perda'; ?>
		<strong class="title">Sobra Bob KG - </strong><?= (isset($producao_info['perdakg'])) ? $producao_info['perdakg'] : 'Sem Perda'; ?>
	</h4>
</div>	
		
	<br>
	<a class="btn btn-info" href="<?= BASE_URL?>/producao">VOLTAR</a>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>