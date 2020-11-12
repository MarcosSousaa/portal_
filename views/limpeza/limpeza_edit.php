<h3 align="center">Limpeza - Editar</h3><br>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>

<h5>
    Data Limpeza: - <?php echo date('d/m/Y', strtotime($limpeza_info['data_limp'])); ?>
    - Horario Limpeza: - <?= $limpeza_info['hrlimp']; ?>
    - Nome Operador: - <?= $limpeza_info['operador'] ;?>
    
</h5>
<h5>Estrutura: - <?= ($limpeza_info['estrutura'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    Proteção: - <?= ($limpeza_info['protecao'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    Painel: - <?= ($limpeza_info['painel'] == '1') ? 'Conforme' : 'Não Conforme' ;?> <br>
    Chão: - <?= ($limpeza_info['chao'] == '1') ? 'Conforme' : 'Não Conforme' ;?><br>
    Produtos Utilizados: - <?= $limpeza_info['prod'];?>
</h5>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="data_limp">Data Limpeza</label>
            <input type="date" name="data_limp" value="<?= $limpeza_info['data_limp']; ?>" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="hrlimp">Horario Limpeza</label>
            <input type="text" name="hrlimp" value="<?= $limpeza_info['hrlimp'];?>" class="form-control">
            <span class="errorMsgHor"></span> 
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>Departamento</label>
            <select id="dep" name="dep" class="form-control">
                <option disabled selected>Departamento</option>
                <option value="ACA" <?= ($limpeza_info['departamento'] == 'ACA') ? 'selected="selected"' : ''; ?>>Acabamento</option>
                <option value="DIS" <?= ($limpeza_info['departamento'] == 'DIS') ? 'selected="selected"' : ''; ?>>Disco</option>
                <option value="EXT" <?= ($limpeza_info['departamento'] == 'EXT') ? 'selected="selected"' : ''; ?>>Extrusão</option>
                <option value="IMP" <?= ($limpeza_info['departamento'] == 'IMP') ? 'selected="selected"' : ''; ?>>Impressora</option>
                <option value="MIS" <?= ($limpeza_info['departamento'] == 'MIS') ? 'selected="selected"' : ''; ?>>Mistura</option>
                <option value="PRA" <?= ($limpeza_info['departamento'] == 'PRA') ? 'selected="selected"' : ''; ?>>Prandi</option>
                <option value="TUB" <?= ($limpeza_info['departamento'] == 'TUB') ? 'selected="selected"' : ''; ?>>Tubete</option>        
            </select>    
        </div>
        <div class="form-group col-md-3">
             <label>Maquina Limpa</label>  
            <select id="maq" name="maq" class="form-control">
                <option disabled selected>Escolha uma maquina</option>
                <option value="">Sem Maquina</option>
                <option value="EST01" <?= ($limpeza_info['maquina'] == 'EST01') ? 'selected="selected"' : ''; ?>>Estufa e Seladora</option>
                <option value="EXT01" <?= ($limpeza_info['maquina'] == 'EXT01') ? 'selected="selected"' : ''; ?>>Extrusora 01</option>
                <option value="EXT02" <?= ($limpeza_info['maquina'] == 'EXT02') ? 'selected="selected"' : ''; ?>>Extrusora 02</option>
                <option value="EXT03" <?= ($limpeza_info['maquina'] == 'EXT03') ? 'selected="selected"' : ''; ?>>Extrusora 03</option>
                <option value="EXT04" <?= ($limpeza_info['maquina'] == 'EXT04') ? 'selected="selected"' : ''; ?>>Extrusora 04</option>
                <option value="EXT05" <?= ($limpeza_info['maquina'] == 'EXT05') ? 'selected="selected"' : ''; ?>>Extrusora 05</option>        
                <option value="GRA01" <?= ($limpeza_info['maquina'] == 'GRA01') ? 'selected="selected"' : ''; ?>>Granuladeira 01</option>
                <option value="GRA02" <?= ($limpeza_info['maquina'] == 'GRA02') ? 'selected="selected"' : ''; ?>>Granuladeira 02</option>
                <option value="GRA03" <?= ($limpeza_info['maquina'] == 'GRA03') ? 'selected="selected"' : ''; ?>>Granuladeira 03</option>
                <option value="IMP01" <?= ($limpeza_info['maquina'] == 'IMP01') ? 'selected="selected"' : ''; ?>>Impressora 01</option>
                <option value="IMP02" <?= ($limpeza_info['maquina'] == 'IMP02') ? 'selected="selected"' : ''; ?>>Impressora 02</option>
                <option value="MIS01" <?= ($limpeza_info['maquina'] == 'MIS01') ? 'selected="selected"' : ''; ?>>Misturador 01</option>
                <option value="MIS02" <?= ($limpeza_info['maquina'] == 'MIS02') ? 'selected="selected"' : ''; ?>>Misturador 02</option>
                <option value="PRA01" <?= ($limpeza_info['maquina'] == 'PRA01') ? 'selected="selected"' : ''; ?>>Prandi 01</option>
                <option value="PRA02" <?= ($limpeza_info['maquina'] == 'PRA02') ? 'selected="selected"' : ''; ?>>Prandi 02</option>
                <option value="RAC01" <?= ($limpeza_info['maquina'] == 'RAC01') ? 'selected="selected"' : ''; ?>>Rachadeira 01</option>
                <option value="RAC02" <?= ($limpeza_info['maquina'] == 'RAC02') ? 'selected="selected"' : ''; ?>>Rachadeira 02</option>
                <option value="REB01" <?= ($limpeza_info['maquina'] == 'REB01') ? 'selected="selected"' : ''; ?>>Rebobinadeira 01</option>
                <option value="REB02" <?= ($limpeza_info['maquina'] == 'REB02') ? 'selected="selected"' : ''; ?>>Rebobinadeira 02</option>
                <option value="REB03" <?= ($limpeza_info['maquina'] == 'REB03') ? 'selected="selected"' : ''; ?>>Rebobinadeira 03</option>
                <option value="REB04" <?= ($limpeza_info['maquina'] == 'REB04') ? 'selected="selected"' : ''; ?>>Rebobinadeira 04</option>
                <option value="REB05" <?= ($limpeza_info['maquina'] == 'REB05') ? 'selected="selected"' : ''; ?>>Rebobinadeira 05</option>
                <option value="REB06" <?= ($limpeza_info['maquina'] == 'REB06') ? 'selected="selected"' : ''; ?>>Rebobinadeira 06</option>
                <option value="REB07" <?= ($limpeza_info['maquina'] == 'REB07') ? 'selected="selected"' : ''; ?>>Rebobinadeira 07</option>
                <option value="TUB08" <?= ($limpeza_info['maquina'] == 'TUB08') ? 'selected="selected"' : ''; ?>>Rebobinadeira 08</option>
                <option value="TUB09" <?= ($limpeza_info['maquina'] == 'TUB09') ? 'selected="selected"' : ''; ?>>Rebobinadeira 09</option>
                <option value="TUB10" <?= ($limpeza_info['maquina'] == 'TUB10') ? 'selected="selected"' : ''; ?>>Rebobinadeira 10</option>
                <option value="TUB11" <?= ($limpeza_info['maquina'] == 'TUB11') ? 'selected="selected"' : ''; ?>>Rebobinadeira 11</option>
                <option value="TUB12" <?= ($limpeza_info['maquina'] == 'TUB12') ? 'selected="selected"' : ''; ?>>Rebobinadeira 12</option>
                <option value="TUB13" <?= ($limpeza_info['maquina'] == 'TUB13') ? 'selected="selected"' : ''; ?>>Rebobinadeira 13</option>
                <option value="TUB14" <?= ($limpeza_info['maquina'] == 'TUB14') ? 'selected="selected"' : ''; ?>>Rebobinadeira 14</option>
                <option value="TUB15" <?= ($limpeza_info['maquina'] == 'TUB15') ? 'selected="selected"' : ''; ?>>Rebobinadeira 15</option>
                <option value="TUB16" <?= ($limpeza_info['maquina'] == 'TUB16') ? 'selected="selected"' : ''; ?>>Rebobinadeira 16</option>
                <option value="REF01" <?= ($limpeza_info['maquina'] == 'REF01') ? 'selected="selected"' : ''; ?>>Refiladeira 01</option>
                <option value="REF02" <?= ($limpeza_info['maquina'] == 'REF02') ? 'selected="selected"' : ''; ?>>Refiladeira 02</option>
                <option value="REF03" <?= ($limpeza_info['maquina'] == 'REF03') ? 'selected="selected"' : ''; ?>>Refiladeira 03</option>
                <option value="REF04" <?= ($limpeza_info['maquina'] == 'REF04') ? 'selected="selected"' : ''; ?>>Refiladeira 04</option>
                <option value="REF05" <?= ($limpeza_info['maquina'] == 'REF05') ? 'selected="selected"' : ''; ?>>Refiladeira 05</option>
                <option value="REF06" <?= ($limpeza_info['maquina'] == 'REF06') ? 'selected="selected"' : ''; ?>>Refiladeira 06</option>
                <option value="MOI01" <?= ($limpeza_info['maquina'] == 'MOI01') ? 'selected="selected"' : ''; ?>>Moinho 01</option>
                <option value="MOI02" <?= ($limpeza_info['maquina'] == 'MOI02') ? 'selected="selected"' : ''; ?>>Moinho 02</option>
                <option value="MOI03" <?= ($limpeza_info['maquina'] == 'MOI03') ? 'selected="selected"' : ''; ?>>Moinho 03</option>
                <option value="MOI04" <?= ($limpeza_info['maquina'] == 'MOI04') ? 'selected="selected"' : ''; ?>>Moinho 04</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Operador</label>
            <select class="form-control" id="operador_edit" name="operador_edit">
                <?php foreach($operador as $p ) : ?>
                <option value="<?=$p['id'] ?>" <?= ($limpeza_info['operador_fk'] == $p['id']) ? 'selected="selected"' : '' ;?>> <?=$p['operador'] ?></option>
                <?php endforeach; ?>
            </select>            
        </div>
        <div class="form-group col-md-3">
            <label>Produtos Utilizados</label><br>
            <input type="text" name="prod" value="<?= $limpeza_info['prod']; ?>" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <fieldset>
                <legend>Selecione o que foi limpo na extrusora</legend>
                <input type="checkbox" name="est" value="1" id="est" <?= ($limpeza_info['estrutura'] == '1') ? 'checked="checked"' : '' ?>>
                <label for="est">Estrutura</label>
                <input type="checkbox" name="prot" value="1" id="prot" <?= ($limpeza_info['protecao'] == '1') ? 'checked="checked"' : '' ?>>
                <label for="prot">Proteção</label>
                <input type="checkbox" name="pain" value="1" id="pain" <?= ($limpeza_info['painel'] == '1') ? 'checked="checked"' : '' ?>>
                <label for="pain">Painel</label>
                <input type="checkbox" name="chao" value="1" id="chao" <?= ($limpeza_info['chao'] == '1') ? 'checked="checked"' : '' ?>>
                <label for="chao">Chão</label>
            </fieldset>    
        </div>
        <div class="form-group col-md-6">
            <fieldset>
                <legend>Situação Aprovação da Qualidade</legend>
                <p>
                    <input type="radio" name="quali" value="1" <?= ($limpeza_info['valid'] == '1') ? 'checked="checked"' : ''; ?>>
                    <label>Aprovado</label>
                    <input type="radio" name="quali" value="2" <?= ($limpeza_info['valid'] == '2') ? 'checked="checked"' : ''; ?>>
                    <label>Reprovado</label>            
                </p>
                <span class="errorMsgSitu"></span>
            </fieldset>    
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Observação</label>
            <textarea class="form-control" name="obs"><?=$limpeza_info['obs'] ?></textarea>
        </div>
    </div>
    <button id="upLimp" class="btn btn-primary">ATUALIZAR</button>
    <a class="btn btn-info" href="<?= BASE_URL?>/limpeza">VOLTAR</a>
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_limpeza_add.js"></script>
