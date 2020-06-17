<h3><center>Relatórios de Produção Sintetica</center></h3>

<form id="frmProducao">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Data Inicial</label>
            <input type="date" name="producao_data_inicial" value="<?php echo date("Y-m-d") ?>" class="form-control">    
        </div>
        <div class="form-group col-md-4">
            <label>Data Final</label> 
            <input type="date" name="producao_data_final" value="<?php echo date("Y-m-d") ?>" class="form-control">  
        </div>
        <div class="form-group col-md-4">
            <label>Pedido</label>
            <input type="text" name="pedido" placeholder="Numero do Pedido" class="form-control">   
        </div>
        <div class="form-group col-md-4">
            <label>Lote</label>
            <input type="text" name="lote" placeholder="Lote Interno" class="form-control">   
        </div>
        <div class="form-group col-md-4">
            <label>Extrusora</label>   
            <select name="ext" class="form-control">
                <option selected value="">ESCOLHA A EXTRUSORA</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Turno</label>
            <select name="turno" class="form-control">
                <option selected value="">ESCOLHA O TURNO</option>
                <option value="001">MANHA</option>
                <option value="002">TARDE</option>
                <option value="003">NOITE</option>            
            </select>   
            
        </div>
    </div>
    
    <div style="text-align: center">
       <button class="btn btn-primary report">Gerar Relatorio <i class="fa fa-file"></i></button>
        <button class="btn btn-danger pdf">Gerar PDF <i class="fa fa-file-pdf-o"></i></button>
        <a class="btn btn-info" href="<?= BASE_URL?>/reports">VOLTAR <i class="fa fa-arrow-circle-left"></i></a>
    </div>

</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_report_producao.js"></script>