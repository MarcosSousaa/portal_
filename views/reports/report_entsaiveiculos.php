<h3><center>Relatórios de Entrada e Saída de Veículos</center></h3>

<form id="frmEntSaiVeiculos">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Data Inicial</label>
            <input type="date" name="ent_sai_data_inicial" value="<?php echo date("Y-m-d") ?>" class="form-control">   
        </div>
        <div class="form-group col-md-4">
            <label>Data Final</label>
            <input type="date" name="ent_sai_data_final" value="<?php echo date("Y-m-d") ?>" class="form-control">    
        </div>
        <div class="form-group col-md-4">
            <label>Placa</label>
            <input type="text" name="ent_sai_placa" placeholder="Informe algo que contem a placa" class="form-control">   
        </div>
        <div class="form-group col-md-4">
            <label>Nome</label>
            <input type="text" name="ent_sai_motorista" placeholder="Nome do Motorista" class="form-control">   
        </div>
        <div class="form-group col-md-4">
            <label>Empresa</label>
            <input type="text" name="ent_sai_empresa" placeholder="Empresa Padrão IND BANDEIRANTE" class="form-control">   
        </div>
    </div>
    <div style="text-align: center">
        <button class="btn btn-primary report">Gerar Relatorio <i class="fa fa-file"></i></button>
        <button class="btn btn-danger pdf">Gerar PDF <i class="fa fa-file-pdf-o"></i></button>
        <a class="btn btn-info" href="<?= BASE_URL?>/reports">VOLTAR <i class="fa fa-arrow-circle-left"></i></a>
    </div>

</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_report_entsaiveiculos.js"></script>