<h3><center>Veículos - Adicionar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="CARRO">Carro</option>
                <option value="MOTO">Moto</option>
            </select>    
        </div>
        <div class="form-group col-md-3">
            <label for="motorista">Motorista</label>
            <input type="text" name="motorista" required="" placeholder="NOME DO MOTORISTA" class="form-control">   
        </div>
        <div class="form-group col-md-3">
            <label for="placa">Placa</label>
            <input type="text" name="placa" placeholder="PLACA DO VEICULO" class="form-control">    
        </div>
        <div class="form-group col-md-3">
            <label for="empresa">Empresa</label>
            <input type="text" name="empresa" placeholder="INFORMA O NOME DA EMPRESA" class="form-control">        
        </div>
    </div>    

    <input type="submit" value="Adicionar" class="btn btn-primary">
    <a href="<?php echo BASE_URL;?>/veiculos" class="btn btn-info">VOLTAR</a>

</form>