<h3><center>Registros - Visualizar</center></h3>

<?php if(isset($records_info) && !empty($records_info) && $records_info['tipov'] == '0'):?>
    <h5>CHAVES</h5>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Data-Retirada</label><br>        
            <input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($records_info['data_er'])). ' - '.$records_info['hora_er'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
             <label>Colaborador-Retirou</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['colab_ret'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
            <label>Codígo-Chave</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['cod'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
             <label>Local-Chave</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['local'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
            <label for="">Data-Devolução</label><br>        
            <input type="text" class="form-control" value="<?= !empty($records_info['data_sr']) ? date('d/m/Y', strtotime($records_info['data_sr'])). ' - '.$records_info['hora_sr'] : 'Sem Devolução'?>" disabled>    
        </div>
        <div class="form-group col-md-3">
            <label>Colaborador-Devolveu</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['colab_dev'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
            
        </div>
    </div>
    <a class="btn btn-info" href="<?= BASE_URL?>/records">VOLTAR</a>
<?php endif; ?>

<?php if(isset($records_info) && !empty($records_info) && $records_info['tipov'] == '1'):?>
    <h5>ENTREGA-RECEBIMENTO</h5>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Data-Entrada</label><br>        
            <input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($records_info['data_er'])). ' - '.$records_info['hora_er'];?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label>Tipo Veículo</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['tipo_v'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
            <label>Placa</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['placa_v'];?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label>RG Motorista</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['rg'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
            <label>Motorista</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['motorista_v'];?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label>Empresa</label>
            <input type="text" name="colab_dev" class="form-control" value="<?php echo $records_info['empresa_v'];?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="">Data-Saída</label>     
            <input type="text" class="form-control" value="<?= !empty($records_info['data_sr']) ? date('d/m/Y', strtotime($records_info['data_sr'])). ' - '.$records_info['hora_sr'] : 'Sem Saída'?>" disabled>
        </div>
    </div>    
    <a class="btn btn-info" href="<?= BASE_URL?>/records">VOLTAR</a>
<?php endif; ?>

<?php if(isset($records_info) && !empty($records_info) && $records_info['tipov'] == '2'):?>
    <h5>ENTRADA VEÍCULOS</h5>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Data-Entrada</label>        
            <input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($records_info['data_er'])). ' - '.$records_info['hora_er'];?>" disabled>    
        </div>
        <div class="form-group col-md-3">
            <label>Placa</label>
            <input type="text" name="colab_dev" class="form-control" value="<?= !empty($records_info['placa']) ? $records_info['placa'] : $records_info['placa_v'];?>" disabled>   
        </div>
        <div class="form-group col-md-3">
            <label>Motorista</label>
            <input type="text" name="colab_dev" class="form-control" value="<?= $records_info['motorista'] ? $records_info['motorista'] : $records_info['motorista_v'];?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label>Empresa</label>
            <input type="text" name="colab_dev" class="form-control" value="<?= !empty($records_info['empresa']) ? $records_info['empresa'] : $records_info['empresa_v'];?>" disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <fieldset>
                <legend style="color: blue; font-size: 15px;">
                    <strong>Saída-Empresa-Intervalo</strong>
                </legend>
                <label for="">Saída</label>
                <input type="text" class="form-control" value="<?= !empty($records_info['hr_int_sai']) ? date('d/m/Y', strtotime($records_info['data_er'])). ' - '.$records_info['hr_int_sai'] : 'Sem saída para Intervalo'?>" disabled>
                <label for="">Entrada</label>
                <input type="text" class="form-control" value="<?= !empty($records_info['hr_int_en']) ? date('d/m/Y', strtotime($records_info['data_er'])). ' - '.$records_info['hr_int_en'] : 'Sem saída para Intervalo'?>" disabled>
            </fieldset>       
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Data-Saída</label>
            <input type="text" class="form-control" value="<?= !empty($records_info['data_sr']) ? date('d/m/Y', strtotime($records_info['data_sr'])). ' - '.$records_info['hora_sr'] : 'Sem Saída'?>" disabled>    
        </div>
        <div class="form-group col-md-6">
            <label>Observação</label>        
            <textarea disabled class="form-control"><?= $records_info['obs'] ?></textarea>
        </div>
        <div class="form-group col-md-3"></div>
        <div class="form-group col-md-3"></div>
    </div>            
    
    <a class="btn btn-info" href="<?= BASE_URL?>/records">VOLTAR</a>
<?php endif; ?>

 <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records_add.js"></script>