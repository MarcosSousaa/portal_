<h1>Limpeza - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-3">
             <label for="data_limp">Data Limpeza</label>
            <input type="date" name="data_limp" class="form-control" required value="<?php echo date('Y-m-d');?>">    
        </div>
        <div class="form-group col-md-3">
            <label for="hrlimp">Horario Limpeza</label>
            <input type="text" name="hrlimp" id="hrlimp" class="form-control">
            <span class="errorMsgHor"></span>    
        </div>
    </div> 
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>Departamento</label>  
            <select id="dep" name="dep" class="form-control">
                <option disabled selected>Escolha um departamento</option>
                <option value="ACA">Acabamento</option>
                <option value="DIS">Disco</option>
                <option value="EXT">Extrusão</option>
                <option value="IMP">Impressora</option>
                <option value="MIS">Mistura</option>   
                <option value="PRA">Prandi</option>
                <option value="TUB">Tubete</option>                    
            </select>    
        </div>   
        <div class="form-group col-md-3">
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
            <span class="errorMsgExt"></span>
        </div>   
        <div class="form-group col-md-3">
            <label>Operador</label>
            <select class="form-control" id="operador" name="operador" class="form-control"></select>
            <span class="errorMsgOperador"></span>     
        </div> 
    </div>
    <div class="form-row">  
        <div class="form-group col-md-6">
            <fieldset>
                <legend>Selecione o que foi limpo na Maquina</legend>
                <input type="checkbox" name="est" value="1" id="est">
                <label for="est">Estrutura</label>
                <input type="checkbox" name="prot" value="1" id="prot">
                <label for="prot">Proteção</label>
                <input type="checkbox" name="pain" value="1" id="pain">
                <label for="pain">Painel</label>
                <input type="checkbox" name="chao" value="1" id="chao">
                <label for="chao">Chão</label>
            </fieldset>    
        </div>
        <div class="form-group col-md-6">
            <label>Produtos Utilizados</label>
            <input type="text" name="prod" class="form-control">    
        </div>   
    </div> 
      
    <button id="addLimp" class="btn btn-primary">Adicionar</button>    
    <a class="btn btn-info" href="<?= BASE_URL?>/limpeza">VOLTAR</a>
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_limpeza_add.js"></script>