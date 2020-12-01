<style>
    .searchresults{
         
    }
</style>


<h3  style="text-align: center">Lote Interno - Visualizar </h3>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="data">Lote</label>
            <input type="text" name="lote" class="form-control" required value="<?= $loteint_info['info']['lote'];?>" disabled>             
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data</label>
            <input type="date" name="data" class="form-control" required value="<?php echo date('Y-m-d', strtotime($loteint_info['info']['data'])); ?>" disabled>             
        </div>        
        <div class="form-group col-md-2">
            <label>Turno</label>  
            <select id="turno" name="turno" class="form-control" disabled>
                <option disabled selected>Escolha uma opção</option>
                <option value="001" <?= ($loteint_info['info']['turno'] == '001') ? 'selected="selected"' : ''; ?>>MANHA</option>
                <option value="002" <?= ($loteint_info['info']['turno'] == '002') ? 'selected="selected"' : ''; ?>>TARDE</option>
                <option value="003" <?= ($loteint_info['info']['turno'] == '003') ? 'selected="selected"' : ''; ?>>NOITE</option>        
            </select>
            <span class="errorMsgTurno"></span>            
        </div>
        <div class="form-group col-md-2">
            <label>Operador Misturador</label>
            <select class="form-control" name="operador_m" disabled>
                <?php foreach($operador as $p ) : ?>
                    <option value="<?=$p['id'] ?>" <?= ($loteint_info['info']['id_operador_m'] == $p['id']) ? 'selected="selected"' : '' ;?>> <?=$p['operador'] ?></option>
                <?php endforeach; ?>
            </select>
                 
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="batidas">Nº Batidas</label>
            <input type="number" name="batidas" id="batidas" class="form-control" disabled value="<?= $loteint_info['info']['batidas'] ?>"> 
        </div>  
        <div class="form-group col-md-2">
            <label>Composto</label>
            <select name="composto" class="form-control" disabled>
                <option disabled="" selected="">Escolha um produto</option>
                <option value="EST"  <?= ($loteint_info['info']['produto'] == 'EST') ? 'selected="selected"' : ''; ?>>Esticavel</option>
                <option value="ENC"  <?= ($loteint_info['info']['produto'] == 'ENC') ? 'selected="selected"' : ''; ?>>Encolhivel</option>
                <option value="SKI"  <?= ($loteint_info['info']['produto'] == 'SKI') ? 'selected="selected"' : ''; ?>>Skin</option>
                <option value="BAN"  <?= ($loteint_info['info']['produto'] == 'BAN') ? 'selected="selected"' : ''; ?>>Banstretch</option>
                <option value="COS"  <?= ($loteint_info['info']['produto'] == 'COS') ? 'selected="selected"' : ''; ?>>Coex Standard</option>
                <option value="COP"  <?= ($loteint_info['info']['produto'] == 'COP') ? 'selected="selected"' : ''; ?>>Coex Plus</option>
            </select>
            <span class="errorMsgComposto"></span>    
        </div>
        <div class="form-group col-md-3">
            <label>Operador Granuladora</label>            
            <select class="form-control" name="operador_g" disabled>
                <?php foreach($operador as $p ) : ?>
                    <option value="<?=$p['id'] ?>" <?= ($loteint_info['info']['id_operador_g'] == $p['id']) ? 'selected="selected"' : '' ;?>> <?=$p['operador'] ?></option>
                <?php endforeach; ?>
            </select>                   
        </div>
         <div class="form-group col-md-2">
            <label for="quantidade">Qtd</label>
            <input type="text" name="quantidade"  class="form-control" value="<?= number_format($loteint_info['info']['qtd'],3,'.',','); ?>" disabled> 
            <span class="errorMsgQtd"></span>     
        </div>      
    </div>
    <div class="row">
    </div>
    <div class="form-row">
        <h2>Materias Prima</h2>        
        
        <table class="table align-items-center table-flush display" width="100%" id="mp_table">
            <tr>        
                <th>MP</th>
                <th>Lote</th>
                <th>Fornecedor</th>
                <th>Qtd</th>
                <th>Tipo</th>                
            </tr>
            <?php foreach($loteint_info['lancamento'] as $lancamento): ?>
            <tr>
                    <td><?= $lancamento['descricao']; ?></td>
                    <td><?= $lancamento['lote_fornecedor']; ?></td>
                    <td><?= $lancamento['fornecedor']; ?></td>
                    <td><?= $lancamento['qtd']; ?></td>
                    <td><?= $tipo[$lancamento['tipo']]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="form-row">        
        <div class="form-group col-md-3">
            <label>Status</label><br>
            <label for="aprovacaofim" class="radio">
                <input type="radio" id="situacaoi" name="situacao" value="1"  <?= ($loteint_info['info']['situacao'] == '1') ? 'checked="checked"' : '' ?> disabled>
                Aprovado
            </label>
            <label for="reprovacaofim" class="radio">
                <input type="radio" id="situacaof" name="situacao" value="2" <?= ($loteint_nfo['info']['situacao'] == '2') ? 'checked="checked"' : '' ?> disabled>
                Reprovado     
            </label>
            <span class="errorMsgSituFim"></span>    
        </div>
    </div>
    <div class="form-row">
        <label for="obs">Observações</label>
        <textarea  class="form-control" rows="5" name="obs"  id="obs" style="text-align:left;" disabled><?=$loteint_info['info']['obs'];?></textarea>
        <span class="errorMsgObs"></span>
    </div>

    
    <a class="btn btn-info" href="<?= BASE_URL?>/loteint">VOLTAR</a>    

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_loteinterno_add.js"></script>

