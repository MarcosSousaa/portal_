<h3  style="text-align: center">Dados Perda - Editar </h3>
<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <div class="form-row">           
        <h5><strong class="title">Data - </strong> <?php echo date('d/m/Y', strtotime($perda_info['data_perd'])); ?>                
            <strong class="title">Setor - </strong> <?=$departamento[$perda_info['departamento']] ;?>            
            <strong class="title">Turno - </strong> <?=$turno[$perda_info['turno']] ;?>
            <br><br>            
            <strong class="title">Maquina - </strong> <?=$maquina[$perda_info['maquina']] ;?>
            <strong class="title">Produto - </strong> <?=$produto[$perda_info['produto']] ;?>
        </h5>
    </div>
    <div class="form-row">        
        <div class="form-group col-md-3">
            <label>Setor</label>
            <select id="dep" name="dep" class="form-control">
                <option disabled selected>Escolha um Setor</option>
                <option value="ACA" <?= ($perda_info['departamento'] == 'ACA') ? 'selected="selected"' : ''; ?>>Acabamento</option>
                <option value="DIS" <?= ($perda_info['departamento'] == 'DIS') ? 'selected="selected"' : ''; ?> >Disco</option>
                <option value="EXT" <?= ($perda_info['departamento'] == 'EXT') ? 'selected="selected"' : ''; ?> >Extrusão</option>
                <option value="IMP" <?= ($perda_info['departamento'] == 'IMP') ? 'selected="selected"' : ''; ?> >Impressora</option>
                <option value="MIS" <?= ($perda_info['departamento'] == 'MIS') ? 'selected="selected"' : ''; ?> >Mistura</option>   
                <option value="PRA" <?= ($perda_info['departamento'] == 'PRA') ? 'selected="selected"' : ''; ?> >Prandi</option>
                <option value="TUB" <?= ($perda_info['departamento'] == 'TUB') ? 'selected="selected"' : ''; ?> >Tubete</option>                    
            </select>
            <span class="errorMsgDep"></span>
        </div>
        <div class="form-group col-md-3">
            <label>Maquina</label>
            <select id="maq" name="maq" class="form-control">
                <option disabled selected>Escolha uma maquina</option>
                <option value="">Sem Maquina</option>
                <option value="EST01" <?= ($perda_info['maquina'] == 'EST01') ? 'selected="selected"' : ''; ?>>Estufa e Seladora</option>
                <option value="EXT01" <?= ($perda_info['maquina'] == 'EXT01') ? 'selected="selected"' : ''; ?>>Extrusora 01</option>
                <option value="EXT02" <?= ($perda_info['maquina'] == 'EXT02') ? 'selected="selected"' : ''; ?>>Extrusora 02</option>
                <option value="EXT03" <?= ($perda_info['maquina'] == 'EXT03') ? 'selected="selected"' : ''; ?>>Extrusora 03</option>
                <option value="EXT04" <?= ($perda_info['maquina'] == 'EXT04') ? 'selected="selected"' : ''; ?>>Extrusora 04</option>
                <option value="EXT05" <?= ($perda_info['maquina'] == 'EXT05') ? 'selected="selected"' : ''; ?>>Extrusora 05</option>        
                <option value="GRA01" <?= ($perda_info['maquina'] == 'GRA01') ? 'selected="selected"' : ''; ?>>Granuladeira 01</option>
                <option value="GRA02" <?= ($perda_info['maquina'] == 'GRA02') ? 'selected="selected"' : ''; ?>>Granuladeira 02</option>
                <option value="GRA03" <?= ($perda_info['maquina'] == 'GRA03') ? 'selected="selected"' : ''; ?>>Granuladeira 03</option>
                <option value="IMP01" <?= ($perda_info['maquina'] == 'IMP01') ? 'selected="selected"' : ''; ?>>Impressora 01</option>
                <option value="IMP02" <?= ($perda_info['maquina'] == 'IMP02') ? 'selected="selected"' : ''; ?>>Impressora 02</option>
                <option value="MIS01" <?= ($perda_info['maquina'] == 'MIS01') ? 'selected="selected"' : ''; ?>>Misturador 01</option>
                <option value="MIS02" <?= ($perda_info['maquina'] == 'MIS02') ? 'selected="selected"' : ''; ?>>Misturador 02</option>
                <option value="PRA01" <?= ($perda_info['maquina'] == 'PRA01') ? 'selected="selected"' : ''; ?>>Prandi 01</option>
                <option value="PRA02" <?= ($perda_info['maquina'] == 'PRA02') ? 'selected="selected"' : ''; ?>>Prandi 02</option>
                <option value="RAC01" <?= ($perda_info['maquina'] == 'RAC01') ? 'selected="selected"' : ''; ?>>Rachadeira 01</option>
                <option value="RAC02" <?= ($perda_info['maquina'] == 'RAC02') ? 'selected="selected"' : ''; ?>>Rachadeira 02</option>
                <option value="REB01" <?= ($perda_info['maquina'] == 'REB01') ? 'selected="selected"' : ''; ?>>Rebobinadeira 01</option>
                <option value="REB02" <?= ($perda_info['maquina'] == 'REB02') ? 'selected="selected"' : ''; ?>>Rebobinadeira 02</option>
                <option value="REB03" <?= ($perda_info['maquina'] == 'REB03') ? 'selected="selected"' : ''; ?>>Rebobinadeira 03</option>
                <option value="REB04" <?= ($perda_info['maquina'] == 'REB04') ? 'selected="selected"' : ''; ?>>Rebobinadeira 04</option>
                <option value="REB05" <?= ($perda_info['maquina'] == 'REB05') ? 'selected="selected"' : ''; ?>>Rebobinadeira 05</option>
                <option value="REB06" <?= ($perda_info['maquina'] == 'REB06') ? 'selected="selected"' : ''; ?>>Rebobinadeira 06</option>
                <option value="REB07" <?= ($perda_info['maquina'] == 'REB07') ? 'selected="selected"' : ''; ?>>Rebobinadeira 07</option>
                <option value="TUB08" <?= ($perda_info['maquina'] == 'TUB08') ? 'selected="selected"' : ''; ?>>Rebobinadeira 08</option>
                <option value="TUB09" <?= ($perda_info['maquina'] == 'TUB09') ? 'selected="selected"' : ''; ?>>Rebobinadeira 09</option>
                <option value="TUB10" <?= ($perda_info['maquina'] == 'TUB10') ? 'selected="selected"' : ''; ?>>Rebobinadeira 10</option>
                <option value="TUB11" <?= ($perda_info['maquina'] == 'TUB11') ? 'selected="selected"' : ''; ?>>Rebobinadeira 11</option>
                <option value="TUB12" <?= ($perda_info['maquina'] == 'TUB12') ? 'selected="selected"' : ''; ?>>Rebobinadeira 12</option>
                <option value="TUB13" <?= ($perda_info['maquina'] == 'TUB13') ? 'selected="selected"' : ''; ?>>Rebobinadeira 13</option>
                <option value="TUB14" <?= ($perda_info['maquina'] == 'TUB14') ? 'selected="selected"' : ''; ?>>Rebobinadeira 14</option>
                <option value="TUB15" <?= ($perda_info['maquina'] == 'TUB15') ? 'selected="selected"' : ''; ?>>Rebobinadeira 15</option>
                <option value="TUB16" <?= ($perda_info['maquina'] == 'TUB16') ? 'selected="selected"' : ''; ?>>Rebobinadeira 16</option>
                <option value="REF01" <?= ($perda_info['maquina'] == 'REF01') ? 'selected="selected"' : ''; ?>>Refiladeira 01</option>
                <option value="REF02" <?= ($perda_info['maquina'] == 'REF02') ? 'selected="selected"' : ''; ?>>Refiladeira 02</option>
                <option value="REF03" <?= ($perda_info['maquina'] == 'REF03') ? 'selected="selected"' : ''; ?>>Refiladeira 03</option>
                <option value="REF04" <?= ($perda_info['maquina'] == 'REF04') ? 'selected="selected"' : ''; ?>>Refiladeira 04</option>
                <option value="REF05" <?= ($perda_info['maquina'] == 'REF05') ? 'selected="selected"' : ''; ?>>Refiladeira 05</option>
                <option value="REF06" <?= ($perda_info['maquina'] == 'REF06') ? 'selected="selected"' : ''; ?>>Refiladeira 06</option>
                <option value="MOI01" <?= ($perda_info['maquina'] == 'MOI01') ? 'selected="selected"' : ''; ?>>Moinho 01</option>
                <option value="MOI02" <?= ($perda_info['maquina'] == 'MOI02') ? 'selected="selected"' : ''; ?>>Moinho 02</option>
                <option value="MOI03" <?= ($perda_info['maquina'] == 'MOI03') ? 'selected="selected"' : ''; ?>>Moinho 03</option>
                <option value="MOI04" <?= ($perda_info['maquina'] == 'MOI04') ? 'selected="selected"' : ''; ?>>Moinho 04</option>
        </select>
        <span class="errorMsgMaq"></span>    
        </div>
        <div class="form-group col-md-3">
            <label>Produto</label>
            <select name="prod" id="prod" class="form-control">
                <option disabled="" selected="">Escolha um produto</option>
                <option value="EST" <?= ($perda_info['produto'] == 'EST') ? 'selected="selected"' : ''; ?>>Esticavel</option>
                <option value="ENC" <?= ($perda_info['produto'] == 'ENC') ? 'selected="selected"' : ''; ?>>Encolhivel</option>
                <option value="SKI" <?= ($perda_info['produto'] == 'SKI') ? 'selected="selected"' : ''; ?>>Skin</option>
                <option value="BAN" <?= ($perda_info['produto'] == 'BAN') ? 'selected="selected"' : ''; ?>>Banstretch</option>
                <option value="COS" <?= ($perda_info['produto'] == 'COS') ? 'selected="selected"' : ''; ?>>Coex Standard</option>
                <option value="COP" <?= ($perda_info['produto'] == 'COP') ? 'selected="selected"' : ''; ?>>Coex Plus</option>
            </select>
            <span class="errorMsgProd"></span>    
        </div>
        <div class="form-group col-md-3">
            <label for="Apara">Apara</label>
            <input type="text" name="apara" id="apara" value="<?=$perda_info['apara']; ?>" class="form-control">
            <span class="errorMsgApara"></span>  
        </div>
        <div class="form-group col-md-3">
            <label for="refile">Refile</label>
            <input type="text" name="refile" id="refile" value="<?=$perda_info['refile']; ?>" class="form-control">            
            <span class="errorMsgRefile"></span>
        </div>
        <div class="form-group col-md-3">
            <label for="borra">Borra</label>
            <input type="text" name="borra" id="borra" value="<?=$perda_info['borra']; ?>" class="form-control">
            <span class="errorMsgBorra"></span> 
        </div>
        <div class="form-group col-md-3">
                <label for="acabamento">Acabamento</label>
                <input type="text" name="acabamento" id="acabamento" value="<?=$perda_info['acabamento']; ?>" class="form-control">
                <span class="errorMsgAcabamento"></span>  
        </div>
        <div class="form-group col-md-3">
            <label for="qtdparada">Qtd.Parada</label>
            <input type="number" name="qtdparada" id="qtdparada" value="<?= $perda_info['qtdparada'];?>" class="form-control">     
        </div>
        <div class="form-group col-md-3">
            <label for="tempoparada">Tempo.Parada</label>
            <input type="text" name="tempoparada" id="tempoparada" value="<?= $perda_info['tempoparada'];?>" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label><strong>Tipos de Paradas</strong></label><br>
            <input type="checkbox" name="oc[]" value="LB" id="LB" <?= (in_array("LB", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="LB">LB-LIMP.BORDA </label>
            <input type="checkbox" name="oc[]" value="BFG" id="BFG" <?= (in_array("BFG", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="BFG">BFG-BALAO FURADO POR GEL</label>
            <input type="checkbox" name="oc[]" value="LM" id="LM" <?= (in_array("LM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="LM">LM-LIMPEZA DE MATRIZ</label>
            <input type="checkbox" name="oc[]" value="PM" id="PM" <?= (in_array("PM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="PM">PM-PROBL.MECANICO</label>
            <input type="checkbox" name="oc[]" value="PE" id="PE" <?= (in_array("PE", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="PE">PE-PROBL.ELETRICO</label>
            <input type="checkbox" name="oc[]" value="AC" id="AC" <?= (in_array("AC", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="AC">AC-ACERTO</label><br>
            <input type="checkbox" name="oc[]" value="LG" id="LG" <?= (in_array("LG", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="LG">LG-LIMP.GERAL</label>
            <input type="checkbox" name="oc[]" value="QE" id="QE" <?= (in_array("QE", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="QE">QE-QUEDA ENERGIA</label>
            <input type="checkbox" name="oc[]" value="ME" id="ME" <?= (in_array("ME", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="ME">ME-MANUTENCAO ELETRICA</label><br>
            <input type="checkbox" name="oc[]" value="MM" id="MM" <?= (in_array("MM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="MM">MM-MANUTENCAO MECANICA</label>
            <input type="checkbox" name="oc[]" value="IM" id="IM" <?= (in_array("IM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="IM">IM - INICIO DA MAQUINA</label>
            <input type="checkbox" name="oc[]" value="LPM" id="LPM" <?= (in_array("LPM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
            <label for="LPM">LPM - LIMPEZA DE MACHO</label>
        </div> 
    </div>
    <input type="submit" value="Atualizar" class="btn btn-primary"c>   
    <a class="btn btn-info" href="<?= BASE_URL?>/producao/perda">VOLTAR</a> 
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

