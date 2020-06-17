<link href="<?= BASE_URL ?>/assets/css/producao.css" rel="stylesheet"/>
<h1 align="center">Perda - Visualizar</h1><br>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<div class="painel_model">
	<h4>
	    <strong class="title">Data Lançamento: - </strong> <?php echo date('d/m/Y', strtotime($perda_info['data_perd'])); ?>
	</h4>
	<h4>
		<strong class="title">Setor - </strong> <?= $departamento[$perda_info['departamento']] ; ?>
		<strong class="title">Turno - </strong> <?= $turno[$perda_info['turno']] ; ?>
		<strong class="title">Maquina - </strong> <?= $maquina[$perda_info['maquina']] ; ?>
		<strong class="title">Produto - </strong> <?= $produto[$perda_info['produto']] ; ?>
	</h4>
	<h4>
		<strong class="title">Apara: - </strong><?= number_format($perda_info['apara'],3,",","."); ?> <br>	   
	    <strong class="title">Refile: - </strong><?= number_format($perda_info['refile'],3,",",".");?> <br>
	    <strong class="title">Borra: - </strong><?= number_format($perda_info['borra'],3,",","."); ?> <br>	   
	    <strong class="title">Acabamento: - </strong><?= number_format($perda_info['acabamento'],3,",",".");?> <br>	    
	</h4>
	<h4>
		<strong class="title">Quantidade Parada Maquína - </strong><?= (isset($perda_info['qtdparada'])) ? $perda_info['qtdparada'] : 'Sem Parada'; ?>
		<strong class="title">Tempo Parada - </strong><?= (isset($perda_info['tempoparada'])) ? $perda_info['tempoparada'] : '00:00'; ?> 
	</h4>

	<h4>
		<strong class="title">Motivo Parada:</strong>
	</h4>
	<input type="checkbox" name="oc[]" disabled <?= (in_array("LB", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>LB - LIMP. BORDA</label>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("BFG", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>BFG - BALÃO FURADO POR GEL</label>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("LM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>LM - LIMP. MATRIZ</label><br>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("PM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>PM - PROBLEMA MECÂNICO</label>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("PE", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>PE - PROBLEMA ELÉTRICO</label>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("AC", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>AC - ACERTO</label><br>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("LG", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>LG - LIMP. GERAL</label>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("QE", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>QE - QUEDA ENERGIA</label>
	<input type="checkbox" name="oc[]" disabled  <?= (in_array("ME", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>ME - MANUTENÇÃO ELETRÍCA</label><br>
	<input type="checkbox" name="oc[]"  disabled <?= (in_array("MM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>MM - MANUTENÇÃO MECÂNICA</label>
	<input type="checkbox" name="oc[]"  disabled <?= (in_array("IM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>IM - INICIO MAQ.</label>
	<input type="checkbox" name="oc[]"  disabled <?= (in_array("LPM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
	<label>LPM - LIMP. MACHO</label><br>	
</div>	
	<br>
	<a class="btn btn-info" href="<?= BASE_URL?>/producao/perda">VOLTAR</a>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>
