<style>
    .searchresults{
         
    }
</style>

<h3  style="text-align: center">Lote Prandi - Visualizar </h3>

<form method="post">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="data">Nº Bob</label>
            <input type="text" name="n_bob" class="form-control" required value="<?= $lotepran_info['info']['n_bob'];?>" disabled>             
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data Iniciada</label>
            <input type="date" name="data_ini" class="form-control" required value="<?php echo date('Y-m-d', strtotime($lotepran_info['info']['data_ini'])); ?>" disabled>             
        </div>        
        <div class="form-group col-md-2">
            <label for="hrini">Hora Inicio</label>
            <input type="text" id="hrini" name="hrini" class="form-control" value="<?= $lotepran_info['info']['hr_ini']?>" disabled>                  
        </div>   
        <div class="form-group col-md-3">
            <label>Turno</label>  
            <select id="turno" name="turno" class="form-control" disabled>
                <option disabled selected>Escolha uma opção</option>
                <option value="001" <?= ($lotepran_info['info']['turno'] == '001') ? 'selected="selected"' : ''; ?>>MANHA</option>
                <option value="002" <?= ($lotepran_info['info']['turno'] == '002') ? 'selected="selected"' : ''; ?>>TARDE</option>
                <option value="003" <?= ($lotepran_info['info']['turno'] == '003') ? 'selected="selected"' : ''; ?>>NOITE</option>        
            </select>                   
        </div>
         <div class="form-group col-md-3">
            <label>Maquina</label>  
            <select id="maquina" name="maquina" class="form-control" disabled>
                <option disabled selected>Escolha uma opção</option>
                <option value="01" <?= ($lotepran_info['info']['maquina'] == '01') ? 'selected="selected"' : ''; ?>>Prandi 01</option>
                <option value="02" <?= ($lotepran_info['info']['maquina'] == '02') ? 'selected="selected"' : ''; ?>>Prandi 02</option>                
            </select>                    
        </div>
        <div class="form-group col-md-3">
            <label>Operador</label>
            <select class="form-control" id="operador" name="operador" disabled>
                <?php foreach($operador as $p ) : ?>
                    <option value="<?=$p['id'] ?>" <?= ($lotepran_info['info']['id_operador'] == $p['id']) ? 'selected="selected"' : '' ;?>> <?=$p['operador'] ?></option>
                <?php endforeach; ?>
            </select>                
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data Finalizada</label>
            <input type="date" name="data_fim" class="form-control" required value="<?php echo date('Y-m-d', strtotime($lotepran_info['info']['data_fim'])); ?>" disabled>             
        </div>        
        <div class="form-group col-md-2">
            <label for="data">Hora Termíno</label>
            <input type="text" id="hrfim" name="hrfim" class="form-control" required value="<?= $lotepran_info['info']['hr_fim']?>" disabled>                          
        </div>   
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="batidas">Especificação</label>
            <input type="text" name="especificacao" id="especificacao" class="form-control" value="<?= $lotepran_info['info']['especificacao']?>" disabled>
        </div>  
         <div class="form-group col-md-2">
            <label for="batidas">Espessura</label>
            <input type="text" name="espessura" id="espessura" class="form-control" value="<?= $lotepran_info['info']['espessura']?>" disabled>
        </div>  
         <div class="form-group col-md-2">
            <label for="batidas">Largura</label>
            <input type="text" name="largura" id="largura" class="form-control" value="<?= $lotepran_info['info']['largura']?>" disabled>
        </div>  
         <div class="form-group col-md-2">
            <label for="batidas">Metragem</label>
            <input type="text" name="metragem" id="metragem" class="form-control" value="<?= $lotepran_info['info']['metragem']?>" disabled>
        </div>  
         <div class="form-group col-md-3">
            <label for="batidas">Gramatura</label>
            <input type="text" name="gramatura" id="gramatura" class="form-control" value="<?= $lotepran_info['info']['gramatura']?>" disabled>
        </div>  
        <div class="form-group col-md-2">
            <label>Tipo</label><br>
            <label for="tipof" class="radio">
                <input type="radio" id="tipof" name="tipo" value="F" <?= ($lotepran_info['info']['tipo'] == 'F') ? 'checked="checked"' : '' ?> disabled>
                Folha
            </label>
            <label for="tipot" class="radio">
                <input type="radio" id="tipot" name="tipo" value="T" <?= ($lotepran_info['info']['tipo'] == 'T') ? 'checked="checked"' : '' ?> disabled>
                Tubular     
            </label>
            <span class="errorMsgTipo"></span>    
        </div>
         <div class="form-group col-md-2">
            <label>Troca tela</label><br>
            <label for="trocas" class="radio">
                <input type="radio" id="trocas" name="tela" value="1" <?= ($lotepran_info['info']['tela'] == '1') ? 'checked="checked"' : '' ?> disabled>
                Sim
            </label>
            <label for="trocan" class="radio">
                <input type="radio" id="trocan" name="tela" value="0" <?= ($lotepran_info['info']['tela'] == '0') ? 'checked="checked"' : '' ?> disabled>
                Não     
            </label>              
        </div>        
         <div class="form-group col-md-3">
            <label for="peso">Peso Total</label>
            <input type="text" name="peso" id="peso" class="form-control" value="<?= $lotepran_info['info']['peso']?>" disabled>               
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
            </tr>   
            <?php foreach($lotepran_info['lancamento'] as $lancamento): ?>
            <tr>
                    <td><?= $lancamento['descricao']; ?></td>
                    <td><?= $lancamento['lote_fornecedor']; ?></td>
                    <td><?= $lancamento['fornecedor']; ?></td>
                    <td><?= $lancamento['qtd']; ?></td>                    
            </tr>
            <?php endforeach; ?>
        </table> 
    </div>
    <div class="form-row">
        <label for="obs">Observações</label>
        <textarea  class="form-control" rows="5" name="obs"  id="obs" style="text-align:left;"><?= $lotepran_info['lancamento']['obs']; ?></textarea>        
    </div>
    <div class="form-row">
        <a class="btn btn-info" href="<?= BASE_URL?>/lotepran">VOLTAR</a>&nbsp;&nbsp;&nbsp;
        <input type="button" name="addLote" id="addLoteP" value="Adicionar" class="btn btn-primary">        
    </div>
    
    
    
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>

