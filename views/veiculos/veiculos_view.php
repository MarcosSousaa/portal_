<h3><center>Veículos - Visualizar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>Tipo</label>
            <input type="" class="form-control" value="<?php echo $veiculos_info['tipo']; ?>" disabled>
        </div>        
        <div class="form-group col-md-3">
            <label for="motorista">Motorista</label>
            <input type="text" name="motorista" required="" class="form-control" value="<?php echo $veiculos_info['motorista'];?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" value="<?php echo $veiculos_info['placa']; ?>" disabled>        
        </div>
        <div class="form-group col-md-3">
            <label for="empresa">Empresa</label>
            <input type="text" name="empresa" class="form-control" value="<?php echo $veiculos_info['empresa'];?>" disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Status do Veículo</label><br>
            <input type="radio" name="status" value="A" <?= ($veiculos_info['status'] == 'A') ? 'checked="checked"' : '' ?>  disabled/>Ativo
            <input type="radio" name="status" value="I" <?= ($veiculos_info['status'] == 'I') ? 'checked="checked"' : '' ?>  disabled/>Inativo     
        </div>
    </div>
      
    <a href="<?php echo BASE_URL;?>/veiculos" class="btn btn-info">VOLTAR</a>

</form>