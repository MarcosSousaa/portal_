<h3><center>Relatórios de Veiculos</center></h3>

<form id="frmVeiculos">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Motorista</label>
            <input type="text" name="veiculo_motorista" class="form-control">    
        </div>
        <div class="form-group col-md-4">
            <label>Placa</label>    
            <input type="text" name="veiculo_placa" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Empresa</label>    
            <input type="text" name="veiculo_empresa" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Tipo</label>
            <select name="tipo" class="form-control">
                <option value="" selected="">Selecione um tipo de veículo</option>
                <option value="CARRO">CARRO</option>
                <option value="CAMINHAO">CAMINHÃO</option>
                <option value="MOTO">MOTO</option>
            </select>   
        </div>
        <div class="form-group col-md-4">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="A" selected>Ativo</option>
                <option value="I">Inativo</option>            
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
<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_report_veiculos.js"></script>