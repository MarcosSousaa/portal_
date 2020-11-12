
<h3  style="text-align: center">Lote Interno - Adicionar </h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="data">Lote</label>
            <input type="text" name="lote" class="form-control" required value="<?= $numero_lote;?>" readonly>             
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data</label>
            <input type="date" name="data" class="form-control" required value="<?php echo date('Y-m-d');?>">             
        </div>        
        <div class="form-group col-md-2">
            <label>Turno</label>  
            <select id="turno" name="turno" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="001">MANHA</option>
                <option value="002">TARDE</option>
                <option value="003">NOITE</option>        
            </select>
            <span class="errorMsgTurno"></span>            
        </div>
        <div class="form-group col-md-2">
            <label>Operador Misturador</label>
            <select class="form-control" id="operador_m" name="operador_m"></select>
            <span class="errorMsgOperadorM"></span>          
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="batidas">Nº Batidas</label>
            <input type="number" name="batidas" id="batidas" class="form-control">
            <span class="errorMsgBatidas"></span>     
        </div>  
        <div class="form-group col-md-2">
            <label>Composto</label>
            <select name="composto" id="composto" class="form-control">
                <option disabled="" selected="">Escolha um produto</option>
                <option value="EST">Esticavel</option>
                <option value="ENC">Encolhivel</option>
                <option value="SKI">Skin</option>
                <option value="BAN">Banstretch</option>
                <option value="COS">Coex Standard</option>
                <option value="COP">Coex Plus</option>
            </select>
            <span class="errorMsgComposto"></span>    
        </div>
        <div class="form-group col-md-2">
            <label>Operador Granuladora</label>
            <select class="form-control" id="operador_g" name="operador_g"></select>
            <span class="errorMsgOperadorG"></span>          
        </div>
         <div class="form-group col-md-2">
            <label for="quantidade">Qtd</label>
            <input type="text" name="quantidade" id="quantidade" class="form-control"> 
            <span class="errorMsgQtd"></span>     
        </div>      
    </div>
    <div class="form-row">
        <h2>Materias Prima</h2>
        <input type="text" id="add_mp" data-type="searchMp" class="form-control" />	
        <table class="table align-items-center table-flush display" width="100%" id="mp_table">
            <tr>        
                <th>MP</th>
                <th>Lote</th>
                <th>Qtd</th>
                <th>Tipo</th>
                <th>Excluir</th>
            </tr>
        </table>
    </div>
    
    <div class="form-row">        
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
    <a class="btn btn-info" href="<?= BASE_URL?>/loteint">VOLTAR</a>
    <input type="button" name="addLote" id="addLoteInt" value="Adicionar" class="btn btn-primary">    
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_loteinterno_add.js"></script>

