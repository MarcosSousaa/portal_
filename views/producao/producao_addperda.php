<h3  style="text-align: center">Dados Perda - Adicionar </h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Data</label>
            <input type="date" name="data_perda" required value="<?php echo date('Y-m-d');?>" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label>Turno</label>
            <select id="turno_perda" name="turno_perda" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="001">MANHA</option>
                <option value="002">TARDE</option>
                <option value="003">NOITE</option>        
            </select>
            <span class="errorMsgTurno"></span>
        </div>
        <div class="form-group col-md-2">
            <label>Setor</label>
            <select id="dep" name="dep" class="form-control">
                <option disabled selected>Escolha um Setor</option>
                <option value="ACA">Acabamento</option>
                <option value="DIS">Disco</option>
                <option value="EXT">Extrusão</option>
                <option value="IMP">Impressora</option>
                <option value="MIS">Mistura</option>   
                <option value="PRA">Prandi</option>
                <option value="TUB">Tubete</option>                    
            </select>
            <span class="errorMsgDep"></span>
        </div>
        <div class="form-group col-md-2">
            <label>Maquina</label>
            <select id="maq" name="maq" class="form-control">
                <option disabled selected>Escolha uma maquina</option>
                <option value="EST01">Estufa e Seladora</option>
                <option value="EXT01">Extrusora 01</option>
                <option value="EXT02">Extrusora 02</option>
                <option value="EXT03">Extrusora 03</option>
                <option value="EXT04">Extrusora 04</option>
                <option value="EXT05">Extrusora 05</option>        
                <option value="GRA01">Granuladeira 01</option>
                <option value="GRA02">Granuladeira 02</option>
                <option value="GRA03">Granuladeira 03</option>
                <option value="IMP01">Impressora 01</option>
                <option value="IMP02">Impressora 02</option>
                <option value="MIS01">Misturador 01</option>
                <option value="MIS02">Misturador 02</option>
                <option value="PRA01">Prandi 01</option>
                <option value="PRA02">Prandi 02</option>
                <option value="RAC01">Rachadeira 01</option>
                <option value="RAC02">Rachadeira 02</option>
                <option value="REB01">Rebobinadeira 01</option>
                <option value="REB02">Rebobinadeira 02</option>
                <option value="REB03">Rebobinadeira 03</option>
                <option value="REB04">Rebobinadeira 04</option>
                <option value="REB05">Rebobinadeira 05</option>
                <option value="REB06">Rebobinadeira 06</option>
                <option value="REB07">Rebobinadeira 07</option>        
                <option value="TUB09">Rebobinadeira 09</option>
                <option value="TUB10">Rebobinadeira 10</option>
                <option value="TUB11">Rebobinadeira 11</option>
                <option value="TUB12">Rebobinadeira 12</option>
                <option value="TUB13">Rebobinadeira 13</option>
                <option value="TUB14">Rebobinadeira 14</option>
                <option value="TUB15">Rebobinadeira 15</option>
                <option value="TUB16">Rebobinadeira 16</option>
                <option value="REF01">Refiladeira 01</option>
                <option value="REF02">Refiladeira 02</option>
                <option value="REF03">Refiladeira 03</option>
                <option value="REF04">Refiladeira 04</option>
                <option value="REF05">Refiladeira 05</option>
                <option value="MOI01">Moinho 01</option>
                <option value="MOI02">Moinho 02</option>
                <option value="MOI03">Moinho 03</option>
                <option value="MOI04">Moinho 04</option>
        </select>
        <span class="errorMsgMaq"></span>    
        </div>
        <div class="form-group col-md-3">
            <label>Produto</label>
            <select name="prod" id="prod" class="form-control">
                <option disabled="" selected="">Escolha um produto</option>
                <option value="EST">Esticavel</option>
                <option value="ENC">Encolhivel</option>
                <option value="SKI">Skin</option>
                <option value="BAN">Banstretch</option>
                <option value="COS">Coex Standard</option>
                <option value="COP">Coex Plus</option>
            </select>
            <span class="errorMsgProd"></span>    
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="apara">Apara</label>
            <input type="text" name="apara" id="apara" class="form-control">
            <span class="errorMsgApara"></span>  
        </div>
        <div class="form-group col-md-3">
            <label for="refile">Refile</label>
            <input type="text" name="refile" id="refile" class="form-control">            
            <span class="errorMsgRefile"></span> 
        </div>
        <div class="form-group col-md-3">
            <label for="borra">Borra</label>
            <input type="text" name="borra" id="borra" class="form-control">
            <span class="errorMsgBorra"></span> 
        </div>
        <div class="form-group col-md-3">
            <label for="acabamento">Acabamento</label>
            <input type="text" name="acabamento" id="acabamento" class="form-control">
            <span class="errorMsgAcabamento"></span>
        </div>
        <div class="form-group col-md-3">
            <label for="qtdparada">Quantidade Parada</label>
            <input type="number" name="qtdparada" id="qtdparada" class="form-control">    
        </div>
        <div class="form-group col-md-3">
            <label for="tempoparada">Tempo Parada</label>
            <input type="text" name="tempoparada" id="tempoparada" class="form-control">          
        </div>
    </div>      
    <fieldset style="height: 150px;">
        <span style="text-align: center;color:blue;font-weight: bold;font-size: 15px;">Motivo Parada</span><br>        
        <label for="LB" class="checkbox">
            <input type="checkbox" name="oc[]" value="LB" id="LB">
            LB-LIMP.BORDA 
        </label>
        <label for="BFG" class="checkbox">
            <input type="checkbox" name="oc[]" value="BFG" id="BFG">
            BFG-BALAO FURADO POR GEL
        </label>
        <label for="LM" class="checkbox">
            <input type="checkbox" name="oc[]" value="LM" id="LM">
            LM-LIMPEZA DE MATRIZ
        </label>
        <label for="PM" class="checkbox">            
            <input type="checkbox" name="oc[]" value="PM" id="PM">
            PM-PROBL.MECANICO
        </label>
        <label for="PE" class="checkbox">            
            <input type="checkbox" name="oc[]" value="PE" id="PE">
            PE-PROBL.ELETRICO
        </label>       
        <br>
        <input type="checkbox" name="oc[]" value="AC" id="AC">
        <label for="AC">AC-ACERTO</label>        
        <input type="checkbox" name="oc[]" value="LG" id="LG">
        <label for="LG">LG-LIMP.GERAL</label>        
        <input type="checkbox" name="oc[]" value="QE" id="QE">
        <label for="QE">QE-QUEDA ENERGIA</label>        
        <input type="checkbox" name="oc[]" value="ME" id="ME">
        <label for="ME">ME-MANUTENCAO ELETRICA</label>        
        <input type="checkbox" name="oc[]" value="MM" id="MM">
        <label for="MM">MM-MANUTENCAO MECANICA</label>
        <br>
        <input type="checkbox" name="oc[]" value="IM" id="IM">
        <label for="IM">IM - INICIO DA MAQUINA</label>        
        <input type="checkbox" name="oc[]" value="LPM" id="LPM">
        <label for="LPM">LPM - LIMPEZA DE MACHO</label>

    </fieldset>   
    <a class="btn btn-info" href="<?= BASE_URL?>/producao/perda">VOLTAR</a>    
    <input type="button" class="btn btn-primary" name="addPerda" id="addPerda" value="Adicionar"> 

</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

