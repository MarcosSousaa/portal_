<h3><center>Relatórios de Chaves</center></h3>

<form method="POST" id="frmChaves">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>Nome Chave</label>
            <input type="text" name="chave_name" class="form-control">    
        </div>
        <div class="form-group col-md-3">
            <label>Nome Local</label>   
            <input type="text" name="local_name" class="form-control">    
        </div>
    </div>
    

    <div style="text-align: center">        
        <button class="btn btn-primary report">Gerar Relatorio <i class="fa fa-file"></i></button>
        <button class="btn btn-danger pdf">Gerar PDF <i class="fa fa-file-pdf-o"></i></button>
        <a class="btn btn-info" href="<?= BASE_URL?>/reports">VOLTAR <i class="fa fa-arrow-circle-left"></i></a>
    </div>

</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_report_chaves.js"></script>