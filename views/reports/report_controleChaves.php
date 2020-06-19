<h3><center>Relatórios de Controle Retirada-Devolução de Chaves</center></h3>

<form id="frmRetDevChaves">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Data Inicial</label>  
            <input type="date" name="control_chaves_data_inicial" value="<?php echo date("Y-m-d") ?>" class="form-control">  
        </div>
        <div class="form-group col-md-4">
            <label>Data Final</label>   
            <input type="date" name="control_chaves_data_final" value="<?php echo date("Y-m-d") ?>" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Local Chave</label>
            <input type="text" name="control_chaves_local" placeholder="Local da Chave" class="form-control">    
        </div>
    </div>    
    <div style="text-align: center">
        <button class="btn btn-primary report">Gerar Relatorio <i class="fa fa-file"></i></button>        
        <a class="btn btn-info" href="<?= BASE_URL?>/reports">VOLTAR <i class="fa fa-arrow-circle-left"></i></a>
    </div>

</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_report_controlechaves.js"></script>