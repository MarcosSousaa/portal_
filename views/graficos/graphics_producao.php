<style type="text/css">
	h1{
		color: blue;
	}
	fieldset{
		font-weight: bold;
	}
	input[type=date]{
		width: 400px;
	}
</style>
<h1 align="center">Grafico Produção - Extrusão</h1>
<form id="graficoProducao">
	<div class="form-row">
		<div class="form-group col-xs-4">
			<label>Data Inicial</label>
			<input type="date" class="form-control" name="data1" value="<?php echo date('Y-m-d');?>">	
		</div>
		<div class="form-group col-xs-4">
			<label>Data Final</label>
			<input type="date" class="form-control" name="data2" value="<?php echo date('Y-m-d');?>">
		</div>	
	</div>
	<button class="btn btn-primary grafico">Gerar Grafico <i class="fa fa-pie-chart"></i></button>        
        <a class="btn btn-info" href="<?= BASE_URL?>/graphics">VOLTAR <i class="fa fa-arrow-circle-left"></i></a>


</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_graphics_producao.js"></script>