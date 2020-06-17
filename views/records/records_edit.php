<style>
    h5 {color: #0652DD;}
</style>
<h1 align="center">Registros - Editar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>

<?php if(isset($records_info) && !empty($records_info) && $records_info['tipov'] == '0'):?>
<h5>COD. Chave - <span><?= $records_info['cod'];?></span></h5>
<h5>LOCAL. Chave - <span><?= $records_info['local'];?></span></h5>
<h5>COLABORADOR RETIROU - <span><?= $records_info['colab_ret'];?></span></h5>
<h5>DATA - <span><?php echo date('d/m/Y',strtotime($records_info['data_er'])). ' - '. $records_info['hora_er'];?></span></h5>
<form  method="post">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Data Devolução</label>
            <input type="hidden" value="<?php echo $records_info['tipo'] ?>" name="tipo">
            <input type="date" class="form-control" name="data_sr" id="data_sr"  value="<?= $records_info['data_sr'] ? $records_info['data_sr'] : date('Y-m-d');?>">
        </div>
        <div class="form-group col-md-3">
            <label for="">Horario Devolução</label>
            <input class="form-control" type="text" name="hora_sr" id="hora_sr" value="<?=  $records_info['hora_sr'] ? $records_info['hora_sr'] : '' ?>">    
        </div>
        <div class="form-group col-md-3">
            <label>Colaborador-Devolução</label>
            <input type="text" class="form-control" name="colab_dev" value="<?= $records_info['colab_dev'] ? $records_info['colab_dev'] : '' ?>">    
        </div>
    </div>   
    <input type="submit" class="btn btn-primary" name="refresh" value="ATUALIZAR">
    <a class="btn btn-info" href="<?= BASE_URL?>/records">VOLTAR</a>
</form>
<?php endif; ?>

<?php if(isset($records_info) && !empty($records_info) && $records_info['tipov'] != '0'):?>
<h5>Data Entrada - <span><?php echo date('d/m/Y',strtotime($records_info['data_er'])). ' - '. $records_info['hora_er'];?></span></h5>
<h5>Nome Motorista - <span><?= !empty($records_info['motorista']) ? $records_info['motorista'] : $records_info['motorista_v'];?></span></h5>
<h5>Placa Veículo - <span><?= !empty($records_info['placa']) ? $records_info['placa'] : $records_info['placa_v'];?></span></h5>
<h5>Empresa- <span><?= !empty($records_info['empresa']) ? $records_info['empresa'] : $records_info['empresa_v'];?></span></h5>

<form  method="post">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Data</label><br>        
            <input type="date" name="data_sr" class="form-control" id="data_sr"  value="<?= $records_info['data_sr'] ? $records_info['data_sr'] : date('Y-m-d');?>">     
        </div>
        <div class="form-group col-md-3">
            <label for="">Horario</label>
            <input type="text" name="hora_sr" class="form-control" id="hora_sr" value="<?=  $records_info['hora_sr'] ? $records_info['hora_sr'] : '' ?>">
        </div>
         <div class="form-group col-md-6">
            <label for="" id="reg">Observações</label>
            <textarea name="obs_reg" id="reg" class="form-control"><?=$records_info['obs'];?></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <fieldset>
                <legend style="color: blue; font-size: 15px;">
                    <strong>Saída-Empresa-Intervalo-Não Obrigátorio</strong>
                </legend>
                <label for="">Saída:</label>
                <input type="text" class="form-control" name="hora_int_sai" id="hora_int_sai" value="<?= $records_info['hr_int_sai']? $records_info['hr_int_sai'] : ''?>">
                <label for="">Entrada:</label>
                <input type="text" class="form-control" name="hora_int_en" id="hora_int_en" value="<?= $records_info['hr_int_en']? $records_info['hr_int_en'] : ''?>">
            </fieldset>
        </div>
    </div>               
    <input type="submit" class="btn btn-primary" name="refresh" value="ATUALIZAR">
    <a class="btn btn-info" href="<?= BASE_URL?>/records">VOLTAR</a>
</form>
<?php endif; ?>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records_add.js"></script>