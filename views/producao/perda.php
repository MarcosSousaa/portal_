<style type="text/css">
    input[type="date"]{
        width: 350px;
    }
    
</style>
<h3><center>Perda</center></h3>
<?php if($producao_add) : ?>
    <a class="btn btn-primary" href="<?= BASE_URL ?>/producao/add_perda">Adicionar Perda</a>
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
                <label>Setor</label>
                <select name="dep" style="width: 200px" class="form-control">
                    <option value="00">Sem Filtro</option>
                    <option value="ACA" <?= ($_SESSION['dep'] == 'ACA') ? 'selected="selected"' : ''; ?>>Acabamento</option>
                     <option value="DIS" <?= ($_SESSION['dep'] == 'DIS') ? 'selected="selected"' : ''; ?>>Disco</option>
                    <option value="EXT" <?= ($_SESSION['dep'] == 'EXT') ? 'selected="selected"' : ''; ?>>Extrusão</option>
                    <option value="IMP" <?= ($_SESSION['dep'] == 'IMP') ? 'selected="selected"' : ''; ?>>Impressora</option>
                    <option value="MIS" <?= ($_SESSION['dep'] == 'MIS') ? 'selected="selected"' : ''; ?>>Mistura</option>   
                    <option value="PRA" <?= ($_SESSION['dep'] == 'PRA') ? 'selected="selected"' : ''; ?>>Prandi</option>
                    <option value="TUB" <?= ($_SESSION['dep'] == 'TUB') ? 'selected="selected"' : ''; ?>>Tubete</option>       
                </select>    
            </div>
            <div class="form-group col-xs-4">
                <label>Maquina</label>
                <select name="maq" style="width: 200px" class="form-control">                
                    <option value="00">Sem Filtro</option>
                    <option value="EST01" <?= ($_SESSION['maq'] == 'EST01') ? 'selected="selected"' : ''; ?> >Estufa e Seladora</option>
                    <option value="EXT01" <?= ($_SESSION['maq'] == 'EXT01') ? 'selected="selected"' : ''; ?> >Extrusora 01</option>
                    <option value="EXT02" <?= ($_SESSION['maq'] == 'EXT02') ? 'selected="selected"' : ''; ?> >Extrusora 02</option>
                    <option value="EXT03" <?= ($_SESSION['maq'] == 'EXT03') ? 'selected="selected"' : ''; ?> >Extrusora 03</option>
                    <option value="EXT04" <?= ($_SESSION['maq'] == 'EXT04') ? 'selected="selected"' : ''; ?> >Extrusora 04</option>
                    <option value="EXT05" <?= ($_SESSION['maq'] == 'EXT05') ? 'selected="selected"' : ''; ?> >Extrusora 05</option>        
                    <option value="GRA01" <?= ($_SESSION['maq'] == 'GRA01') ? 'selected="selected"' : ''; ?> >Granuladeira 01</option>
                    <option value="GRA02" <?= ($_SESSION['maq'] == 'GRA02') ? 'selected="selected"' : ''; ?> >Granuladeira 02</option>
                    <option value="GRA03" <?= ($_SESSION['maq'] == 'GRA03') ? 'selected="selected"' : ''; ?> >Granuladeira 03</option>
                    <option value="IMP01" <?= ($_SESSION['maq'] == 'IMP01') ? 'selected="selected"' : ''; ?> >Impressora 01</option>
                    <option value="IMP02" <?= ($_SESSION['maq'] == 'IMP02') ? 'selected="selected"' : ''; ?> >Impressora 02</option>
                    <option value="MIS01" <?= ($_SESSION['maq'] == 'MIS01') ? 'selected="selected"' : ''; ?> >Misturador 01</option>
                    <option value="MIS02" <?= ($_SESSION['maq'] == 'MIS02') ? 'selected="selected"' : ''; ?> >Misturador 02</option>
                    <option value="PRA01" <?= ($_SESSION['maq'] == 'PRA01') ? 'selected="selected"' : ''; ?> >Prandi 01</option>
                    <option value="PRA02" <?= ($_SESSION['maq'] == 'PRA02') ? 'selected="selected"' : ''; ?> >Prandi 02</option>
                    <option value="RAC01" <?= ($_SESSION['maq'] == 'RAC02') ? 'selected="selected"' : ''; ?> >Rachadeira 01</option>
                    <option value="RAC02" <?= ($_SESSION['maq'] == 'RAC03') ? 'selected="selected"' : ''; ?> >Rachadeira 02</option>
                    <option value="REB01" <?= ($_SESSION['maq'] == 'REB01') ? 'selected="selected"' : ''; ?> >Rebobinadeira 01</option>
                    <option value="REB02" <?= ($_SESSION['maq'] == 'REB02') ? 'selected="selected"' : ''; ?> >Rebobinadeira 02</option>
                    <option value="REB03" <?= ($_SESSION['maq'] == 'REB03') ? 'selected="selected"' : ''; ?> >Rebobinadeira 03</option>
                    <option value="REB04" <?= ($_SESSION['maq'] == 'REB04') ? 'selected="selected"' : ''; ?> >Rebobinadeira 04</option>
                    <option value="REB05" <?= ($_SESSION['maq'] == 'REB05') ? 'selected="selected"' : ''; ?> >Rebobinadeira 05</option>
                    <option value="REB06" <?= ($_SESSION['maq'] == 'REB06') ? 'selected="selected"' : ''; ?> >Rebobinadeira 06</option>
                    <option value="REB07" <?= ($_SESSION['maq'] == 'REB07') ? 'selected="selected"' : ''; ?> >Rebobinadeira 07</option>        
                    <option value="TUB09" <?= ($_SESSION['maq'] == 'REB09') ? 'selected="selected"' : ''; ?> >Rebobinadeira 09</option>
                    <option value="TUB10" <?= ($_SESSION['maq'] == 'TUB10') ? 'selected="selected"' : ''; ?> >Rebobinadeira 10</option>
                    <option value="TUB11" <?= ($_SESSION['maq'] == 'TUB11') ? 'selected="selected"' : ''; ?> >Rebobinadeira 11</option>
                    <option value="TUB12" <?= ($_SESSION['maq'] == 'TUB12') ? 'selected="selected"' : ''; ?> >Rebobinadeira 12</option>
                    <option value="TUB13" <?= ($_SESSION['maq'] == 'TUB13') ? 'selected="selected"' : ''; ?> >Rebobinadeira 13</option>
                    <option value="TUB14" <?= ($_SESSION['maq'] == 'TUB14') ? 'selected="selected"' : ''; ?> >Rebobinadeira 14</option>
                    <option value="TUB15" <?= ($_SESSION['maq'] == 'TUB15') ? 'selected="selected"' : ''; ?> >Rebobinadeira 15</option>
                    <option value="TUB16" <?= ($_SESSION['maq'] == 'TUB16') ? 'selected="selected"' : ''; ?> >Rebobinadeira 16</option>
                    <option value="REF01" <?= ($_SESSION['maq'] == 'REF01') ? 'selected="selected"' : ''; ?> >Refiladeira 01</option>
                    <option value="REF02" <?= ($_SESSION['maq'] == 'REF02') ? 'selected="selected"' : ''; ?> >Refiladeira 02</option>
                    <option value="REF03" <?= ($_SESSION['maq'] == 'REF03') ? 'selected="selected"' : ''; ?> >Refiladeira 03</option>
                    <option value="REF04" <?= ($_SESSION['maq'] == 'REF04') ? 'selected="selected"' : ''; ?> >Refiladeira 04</option>
                    <option value="REF05" <?= ($_SESSION['maq'] == 'REF05') ? 'selected="selected"' : ''; ?> >Refiladeira 05</option>
                    <option value="MOI01" <?= ($_SESSION['maq'] == 'MOI01') ? 'selected="selected"' : ''; ?> >Moinho 01</option>
                    <option value="MOI02" <?= ($_SESSION['maq'] == 'MOI02') ? 'selected="selected"' : ''; ?> >Moinho 02</option>
                    <option value="MOI03" <?= ($_SESSION['maq'] == 'MOI03') ? 'selected="selected"' : ''; ?> >Moinho 03</option>
                    <option value="MOI04" <?= ($_SESSION['maq'] == 'MOI04') ? 'selected="selected"' : ''; ?> >Moinho 04</option>
                </select>   
            </div>
            &nbsp;&nbsp;&nbsp;
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

<table width="100%" class="table table-striped paginated">
    <thead>
        <tr>
            <th>Data</th>
            <th>Turno</th>
            <th>Departamento</th> 
            <th>Maquina</th>                   
            <th>Produto</th>
            <th>Apara</th>
            <th>Refile</th>
            <th>Borra</th>
            <th>Acabamento/Disco</th>
            <th width="70">Ações</th>                
        </tr>    
    </thead>
    <tbody>
    <?php foreach ($perda_list as $pd): ?>
        <tr>
            <td><?= date('d/m/Y',strtotime($pd['data_perd'])) ?></td>
            <td><?= $turno[$pd['turno']] ?></td>
            <td><?= $departamento[$pd['departamento']]?></td>      
            <td><?= $maquina[$pd['maquina']]?></td>      
            <td><?= $produto[$pd['produto']]?></td>      
            <td><?= $pd['apara'] ?></td>
            <td><?= $pd['refile'] ?></td>
            <td><?= $pd['borra'] ?></td>
            <td><?= $pd['acabamento'] ?></td>                    
            <td>
                <a class="btn btn-primary" href="<?= BASE_URL ?>/producao/view_perda/<?= $pd['id'] ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-warning" href="<?= BASE_URL ?>/producao/edit_perda/<?= $pd['id'] ?>"><i class="fa fa-edit"></i></a>
                </td>                
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao.js"></script>