<h3><center>Relatórios de Recebimento e Coleta</center></h3>

<form id="frmRecbColeta">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Data Inicial</label>   
            <input type="date" name="receb_colet_data_inicial" class="form-control" value="<?php echo date("Y-m-d") ?>"> 
        </div>
        <div class="form-group col-md-4">
            <label>Data Final</label>   
            <input type="date" name="receb_colet_data_final" class="form-control" value="<?php echo date("Y-m-d") ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Placa</label>
            <input type="text" name="receb_colet_placa" class="form-control" placeholder="Informe algo que contem a placa">    
        </div>
        <div class="form-group col-md-4">
            <label>Nome</label>
            <input type="text" name="receb_colet_motorista" class="form-control" placeholder="Nome do Motorista">
        </div>
        <div class="form-group col-md-4">
            <label>Empresa</label>
            <input type="text" name="receb_colet_empresa" class="form-control" placeholder="Empresa Padrão IND BANDEIRANTE">
        </div>
    </div>    
   
    <div style="text-align: center">
        <button class="btn btn-primary report">Gerar Relatorio <i class="fa fa-file"></i></button>        
        <a class="btn btn-info" href="<?= BASE_URL?>/reports">VOLTAR <i class="fa fa-arrow-circle-left"></i></a>
    </div>

</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_report_recebcoleta.js"></script>