<h3 align="center">Producao - Editar</h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">	
<div class="painel_model">
	<h5><strong class="title">Nº Extrusora Produzida: </strong> <?= $producao_info['extrusora'] ; ?>
		<strong class="title">Turno: </strong> <?= $turno[$producao_info['turno']] ; ?>
     	<strong class="title"> Nome Operador:  </strong> <?= $producao_info['operador'] ;?>
	    
	</h5>
	<div class="form-row">
		<div class="form-group col-md-3">
            <label>Extrusora</label>  
            <select id="extrusora_prod" name="extrusora_prod" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="01" <?= ($producao_info['extrusora'] == '01') ? 'selected="selected"' : ''; ?> >Extrusora 01</option>
                <option value="02" <?= ($producao_info['extrusora'] == '02') ? 'selected="selected"' : ''; ?>>Extrusora 02</option>
                <option value="03" <?= ($producao_info['extrusora'] == '03') ? 'selected="selected"' : ''; ?>>Extrusora 03</option>
                <option value="04" <?= ($producao_info['extrusora'] == '04') ? 'selected="selected"' : ''; ?>>Extrusora 04</option>
                <option value="05" <?= ($producao_info['extrusora'] == '05') ? 'selected="selected"' : ''; ?>>Extrusora 05</option>
            </select>
            <span class="errorMsgExt"></span>    
        </div>        
        <div class="form-group col-md-3">
            <label>Operador</label>
            <select class="form-control" name="operador">
            	<?php foreach($operador as $p ) : ?>
                <option value="<?=$p['id'] ?>" <?= ($producao_info['operador_fk'] == $p['id']) ? 'selected="selected"' : '' ;?>> <?=$p['operador'] ?></option>
                <?php endforeach; ?>
            </select>
            <span class="errorMsgOperador"></span>          
        </div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label>Data Produção</label>
			<input type="date" name="data_prod" required value="<?php echo date('Y-m-d', strtotime($producao_info['data_prod'])); ?>" class="form-control">     
		</div>
		<div class="form-group col-md-3">
			<label>Hora Inicio</label>
			 <input type="text" name="hrini" id="hrini" value="<?= $producao_info['hri']; ?>" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label>Situação</label><br>
		 	<label for="aprovacaoini" class="radio">
				<input type="radio" name="aprovacaoini" id="aprovacaoini" value="1" <?= ($producao_info['situacaoini'] == 'Aprovado') ? 'checked="checked"' : ''?>>
				Aprovado 	
		 	</label>
	 	 	<label for="reprovacaoini" class="radio">
		 		<input type="radio" name="aprovacaoini" id="reprovacaoini" value="2" <?= ($producao_info['situacaoini'] == 'Reprovado') ? 'checked="checked"' : ''?>>
		 		Reprovado 	
	 	 	</label>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label>Data Finalizada</label>
			 <input type="date" name="data_f" required value="<?php echo date('Y-m-d', strtotime($producao_info['data_f'])); ?>" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label>Hora Finalizada</label>
			 <input type="text" name="hrfim" id="hrfim" value="<?= $producao_info['hrf']; ?>" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label>Situação</label><br>
			<label for="aprovacaofim" class="radio">
				<input type="radio" id="aprovacaofim" name="aprovacaofim" value="1" <?= ($producao_info['situacaofim'] == 'Aprovado') ? 'checked="checked"' : ''?>>
				Aprovado
			</label>
		 	<label for="reprovacaofim" class="radio">
		 		 <input type="radio" id="reprovacaofim" name="aprovacaofim" value="2" <?= ($producao_info['	situacaofim'] == 'Reprovado') ? 'checked="checked"' : ''?>>	
			 	Reprovado
			</label> 
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label>Pedido</label>
			<input type="text" name="pedido" id="pedido" value="<?= $producao_info['pedido']; ?>" class="form-control">		
		</div>
		<div class="form-group col-md-3">
			<label>Ordem</label>
			<input type="text" name="ordem" id="ordem" value="<?= $producao_info['ordem']; ?>" class="form-control">	
		</div>
		<div class="form-group col-md-3">
			<label>Lote</label>	
			<input type="text" name="lote" id="lote" value="<?= $producao_info['lote'];?>" class="form-control">
		</div>
		<div class="form-group col-md-1">
			<label>Rpm</label>	
			<input type="text" name="rpm" id="rpm" value="<?= $producao_info['rpm'];?>" class="form-control">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label>Peso Bob</label>
			<input type="text" name="peso_bob" id="peso_bob" value="<?= number_format($producao_info['pesobob'],3,",","."); ?>" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label>Quantidade Produzida</label>
			<input type="number" name="quantidade" id="quantidade" value="<?= $producao_info['qtdbob']; ?>" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label>Total Produzido</label>
			<input type="text"  name="total" id="total" readonly="" value="<?= number_format($producao_info['totalbob'],3,",",".");?> " class="form-control">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label>Largura</label>
		 	<input type="text" name="larg" id="larg" value="<?= $producao_info['larg'];?>" class="form-control">
		</div>	
		<div class="form-group col-md-3">
			<label>Espessura</label>
			<input type="text" name="esp" id="esp" value="<?= $producao_info['esp'];?> " class="form-control">
		</div>	
		<div class="form-group col-md-3">
			<label>Metragem</label>
			<input type="text" name="metrag" id="metrag" value="<?= $producao_info['metrag'];?>    " class="form-control"> 
		</div>	
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label>Sobra Bob. Qtd</label>
			<input type="number" name="sobrabob" value="<?= (isset($producao_info['perdabob'])) ? $producao_info['perdabob'] : ''; ?>" class="form-control">
		</div>	
		<div class="form-group col-md-3">
			<label>Sobra Bob. KG</label>
			<input type="text" name="sobrabobkg" id="sobrabobkg" value="<?= (isset($producao_info['perdakg'])) ? $producao_info['perdakg'] : ''; ?>" class="form-control">
		</div>	
		
	</div>					
</div>

	<input type="submit" class="btn btn-primary" value="ATUALIZAR">	
	<a class="btn btn-info" href="<?= BASE_URL?>/producao">VOLTAR</a>
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>