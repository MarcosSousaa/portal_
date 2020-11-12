
<style type="text/css">
    input[type="date"]{
        width: 350px;
    }
    
</style>
<h3><center>Produção</center></h3>    
<?php if($producao_add) : ?>
<a class="btn btn-primary" href="<?= BASE_URL ?>/producao/add_prod"> Adicionar Produção</a>        
<?php endif; ?>
<hr>
<div class="filtro-data">
    <form method="POST">
        <h2><center>Filtros</center></h2>
        <div class="row">
            <div class="form-group col-xs-4">
                <label>Data Inicial</label>
                <input type="date" class="form-control" name="data1" value="<?= (isset($_SESSION['data1']) && !empty($_SESSION['data1'])) ? date('Y-m-d', strtotime($_SESSION['data1'])) : date('Y-m-d');?>">
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="form-group col-xs-4">
                <label>Data Final</label>
                <input type="date" class="form-control" name="data2" value="<?= (isset($_SESSION['data2']) && !empty($_SESSION['data2'])) ? date('Y-m-d', strtotime($_SESSION['data2'])) : date('Y-m-d');?>">    
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="form-group col-xs-4">
                <label>Extrusora</label>
                <select name="ext" style="width: 200px" class="form-control">
                    <option value="" disabled selected>Escolha a Extrusora</option>
                    <option value="00">Sem Filtro</option>
                    <option value="01" <?= ($_SESSION['ext'] == '01') ? 'selected="selected"' : ''; ?>>Extrusora 01</option>
                    <option value="02" <?= ($_SESSION['ext'] == '02') ? 'selected="selected"' : ''; ?>>Extrusora 02</option>
                    <option value="03" <?= ($_SESSION['ext'] == '03') ? 'selected="selected"' : ''; ?>>Extrusora 03</option>
                    <option value="04" <?= ($_SESSION['ext'] == '04') ? 'selected="selected"' : ''; ?>>Extrusora 04</option>
                    <option value="05" <?= ($_SESSION['ext'] == '05') ? 'selected="selected"' : ''; ?>>Extrusora 05</option>
                </select>    
            </div>
            <div class="form-group col-xs-4">
                <label>Turno</label>
                <select name="turno" style="width: 400px" class="form-control">
                    <option value="" disabled selected>Escolha o Turno</option>
                    <option value="000">Sem Filtro</option>
                    <option value="001" <?= ($_SESSION['turno'] == '001') ? 'selected="selected"' : ''; ?>>MANHÃ</option>
                    <option value="002" <?= ($_SESSION['turno'] == '002') ? 'selected="selected"' : ''; ?>>TARDE</option>
                    <option value="003" <?= ($_SESSION['turno'] == '003') ? 'selected="selected"' : ''; ?>>NOITE</option>                
                </select>    
            </div>
        </div>
        <div class="row">
            <button id="btnPesquisaFiltro" class="btn btn-primary">Pesquisar</button>      
             
        </div>                                                                       
    </form>
</div>
<hr>
    <?php if(isset($error) && !empty($error)) :?>
    <div class="erro" style="color:white;font-weight: bold;font-size: 17px;">       
        <div class="alert alert-warning" role="alert" id="error">
            <?php echo $error; ?>
        </div>
    </div>


    <?php endif; ?>
<table class="table table-striped table-bordered display nowrap" id="tabelaProd" style="width: 100%;">
    <thead>
        <tr>            
            <th>Inicio</th>
            <th>Extrusora</th>
            <th>Turno</th>
            <th>Operador</th>
            <th>Nº Pedido</th>
            <th>Produzido KG</th>
            <th>Término</th>
            <th width="120">Ações</th>
        </tr>    
    </thead>
    <tbody>
        <?php foreach ($producao_list as $pl): ?>
            <tr>                
                <td><?= date('d/m/Y', strtotime($pl['data_prod'])). ' - '.$pl['hri']; ?></td>                    
                <td><?= $pl['extrusora'] ?></td>
                <td><?php echo $turno[$pl['turno']]; ?></td>
                <td><?= $pl['operador'] ?></td>
                <td><?= $pl['pedido'] ?></td>
                <td><?= number_format($pl['totalbob'], 2, ',', '.'); ?></td>
                <td><?= date('d/m/Y', strtotime($pl['data_f'])). ' - '. $pl['hrf']; ?></td>                    
                <td>
                    <a class="btn btn-primary" href="<?= BASE_URL ?>/producao/view_prod/<?= $pl['id'] ?>"><i class="fa fa-eye"></i></a>
                    <?php if($pl['operador'] == $user_name){

                     ?>
                    <a class="btn btn-warning" href="<?= BASE_URL ?>/producao/edit_prod/<?= $pl['id'] ?>"><i class="fa fa-edit"></i></a>
                    <?php }else{}
                     ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5" style="text-align:right">Total:</th>
            <th></th>
        </tr>
    </tfoot>
</table>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao.js"></script>
