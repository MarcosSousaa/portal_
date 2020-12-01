<style>
    .searchresults{
         
    }
</style>


<h3  style="text-align: center">Lote Prandi - Adicionar </h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="data">Nº Bob</label>
            <input type="text" name="n_bob" class="form-control" required value="<?= $numero_bob;?>" readonly>             
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data Iniciada</label>
            <input type="date" name="data_ini" class="form-control" required value="<?php echo date('Y-m-d');?>">             
        </div>        
        <div class="form-group col-md-2">
            <label for="hrini">Hora Inicio</label>
            <input type="text" id="hrini" name="hrini" class="form-control" required>  
            <span class="errorMsgHrini"></span>           
        </div>   
        <div class="form-group col-md-3">
            <label>Turno</label>  
            <select id="turno" name="turno" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="001">MANHA</option>
                <option value="002">TARDE</option>
                <option value="003">NOITE</option>        
            </select>
            <span class="errorMsgTurno"></span>            
        </div>
         <div class="form-group col-md-3">
            <label>Maquina</label>  
            <select id="maquina" name="maquina" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="01">Prandi 01</option>
                <option value="02">Prandi 02</option>                
            </select>
            <span class="errorMsgMaquina"></span>            
        </div>
        <div class="form-group col-md-3">
            <label>Operador</label>
            <select class="form-control" id="operador" name="operador"></select>
            <span class="errorMsgOperador"></span>          
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data Finalizada</label>
            <input type="date" name="data_fim" class="form-control" required value="<?php echo date('Y-m-d');?>">             
        </div>        
        <div class="form-group col-md-2">
            <label for="data">Hora Termíno</label>
            <input type="text" id="hrfim" name="hrfim" class="form-control" required value="">  
            <span class="errorMsgHrfim"></span>                  
        </div>   
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="batidas">Especificação</label>
            <input type="text" name="especificacao" id="especificacao" class="form-control">
            <span class="errorMsgEspecificacao"></span>     
        </div>  
         <div class="form-group col-md-2">
            <label for="batidas">Espessura</label>
            <input type="text" name="espessura" id="espessura" class="form-control">
            <span class="errorMsgEspessura"></span>     
        </div>  
         <div class="form-group col-md-2">
            <label for="batidas">Largura</label>
            <input type="text" name="largura" id="largura" class="form-control">
            <span class="errorMsgLargura"></span>     
        </div>  
         <div class="form-group col-md-2">
            <label for="batidas">Metragem</label>
            <input type="text" name="metragem" id="metragem" class="form-control">
            <span class="errorMsgMetragem"></span>     
        </div>  
         <div class="form-group col-md-3">
            <label for="batidas">Gramatura</label>
            <input type="text" name="gramatura" id="gramatura" class="form-control">
            <span class="errorMsgGramatura"></span>     
        </div>  
        <div class="form-group col-md-2">
            <label>Tipo</label><br>
            <label for="tipof" class="radio">
                <input type="radio" id="tipof" name="tipo" value="F">
                Folha
            </label>
            <label for="tipot" class="radio">
                <input type="radio" id="tipot" name="tipo" value="T">
                Tubular     
            </label>
            <span class="errorMsgTipo"></span>    
        </div>
         <div class="form-group col-md-2">
            <label>Troca tela</label><br>
            <label for="trocas" class="radio">
                <input type="radio" id="trocas" name="tela" value="1">
                Sim
            </label>
            <label for="trocan" class="radio">
                <input type="radio" id="trocan" name="tela" value="0" checked>
                Não     
            </label>
            <span class="errorMsgTela"></span>    
        </div>        
         <div class="form-group col-md-3">
            <label for="peso">Peso Total</label>
            <input type="text" name="peso" id="peso" class="form-control"> 
            <span class="errorMsgPeso"></span>     
        </div>      
    </div>
    <div class="row">
    </div>
    <div class="form-row">
        <h2>Materias Prima</h2>
        <input type="text" id="add_mp" data-type="searchMp" class="form-control" />	
        
        <table class="table align-items-center table-flush display" width="100%" id="mp_table">
            <tr>        
                <th>MP</th>
                <th>Lote</th>
                <th>Qtd</th>                
                <th>Excluir</th>
            </tr>
        </table>
    </div>

    <div class="form-row">
        <label for="obs">Observações</label>
        <textarea  class="form-control" rows="5" name="obs"  id="obs" style="text-align:left;"></textarea>
        <span class="errorMsgObs"></span>
    </div>

    
    <a class="btn btn-info" href="<?= BASE_URL?>/lotepran">VOLTAR</a>
    <input type="button" name="addLote" id="addLoteP" value="Adicionar" class="btn btn-primary">        
    
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_loteprandi_add.js"></script>

