
<h3  style="text-align: center">Dados Produção - Adicionar </h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="data_limp">Data Produção</label>
            <input type="date" name="data_prod" class="form-control" required value="<?php echo date('Y-m-d');?>">             
        </div>
        <div class="form-group col-md-3">
            <label>Extrusora</label>  
            <select id="extrusora_prod" name="extrusora_prod" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="01">Extrusora 01</option>
                <option value="02">Extrusora 02</option>
                <option value="03">Extrusora 03</option>
                <option value="04">Extrusora 04</option>
                <option value="05">Extrusora 05</option>
            </select>
            <span class="errorMsgExt"></span>    
        </div>
        <div class="form-group col-md-3">
            <label>Turno</label>  
            <select id="turno_prod" name="turno_prod" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="001">MANHA</option>
                <option value="002">TARDE</option>
                <option value="003">NOITE</option>        
            </select>
            <span class="errorMsgTurno"></span>            
        </div>
        <div class="form-group col-md-3">
            <label>Operador</label>
            <select class="form-control" id="operador" name="operador"></select>
            <span class="errorMsgOperador"></span>          
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="hrlimp">Horario Inicio</label>
            <input type="text" name="hrini" id="hrini" class="form-control">
            <span class="errorMsgHorIni"></span>     
        </div>
        <div class="form-group col-md-3">
            <label>Status</label><br>
            <label for="aprovacaoini" class="radio">
                <input type="radio" name="aprovacaoini" id="aprovacaoini" value="1">
                Aprovado
            </label>
            <label for="reprovacaoini" class="radio">
                <input type="radio" name="aprovacaoini" id="reprovacaoini" value="2">
                Reprovado    
            </label>                
        </div>        
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="pedido">NºPed</label>
            <input type="text" name="pedido" id="pedido" class="form-control">
            <span class="errorMsgPedido"></span>      
        </div>
        <div class="form-group col-md-3">
            <label for="ordem">NºOp</label>
            <input type="text" name="ordem" id="ordem" class="form-control">
            <span class="errorMsgOrdem"></span>                
        </div>
        <div class="form-group col-md-3">
            <label for="lote">Lote</label>
            <input type="text" name="lote" id="lote" class="form-control">
            <span class="errorMsgLote"></span>    
        </div>
        <div class="form-group col-md-3">
            <label for="rpm">Rpm</label>
            <input type="text" name="rpm" id="rpm" class="form-control">
            <span class="errorMsgRpm"></span>    
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="peso_bob">Peso</label>
            <input type="text" name="peso_bob" id="peso_bob" class="form-control">
            <span class="errorMsgPeso"></span>        
        </div>
        <div class="form-group col-md-3">
            <label for="quantidade">Qtd</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control"> 
            <span class="errorMsgQtd"></span>     
        </div>
        <div class="form-group col-md-3">
            <label for="total">Total</label>
            <input type="text"  name="total" id="total" readonly="" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="larg">Larg</label>
            <input type="text" name="larg" id="larg" class="form-control">    
        </div>
        <div class="form-group col-md-3">
            <label for="esp">Esp</label>
            <input type="text" name="esp" id="esp" class="form-control">    
        </div>
        <div class="form-group col-md-3">
            <label for="metrag">Metrag</label>
            <input type="text" name="metrag" id="metrag" class="form-control">     
        </div>
    </div>   
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="data_limp">Data Fim</label>
            <input type="date" name="data_f"  class="form-control" required value="<?php echo date('Y-m-d');?>"> 
        </div>
        <div class="form-group col-md-3">
            <label for="hrfim">Horario Termino</label>
            <input type="text" name="hrfim" id="hrfim" class="form-control"> 
            <span class="errorMsgHorFim"></span>    
        </div>
        <div class="form-group col-md-3">
            <label>Status</label><br>
            <label for="aprovacaofim" class="radio">
                <input type="radio" id="aprovacaofim" name="aprovacaofim" value="1">
                Aprovado
            </label>
            <label for="reprovacaofim" class="radio">
                <input type="radio" id="reprovacaofim" name="aprovacaofim" value="2">
                Reprovado     
            </label>
            <span class="errorMsgSituFim"></span>    
        </div>
    </div>
    <a class="btn btn-info" href="<?= BASE_URL?>/producao">VOLTAR</a>
    <input type="button" name="addProd" id="addProd" value="Adicionar" class="btn btn-primary">    
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

