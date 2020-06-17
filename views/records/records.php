<style type="text/css">
    input[type="date"]{
        width: 350px;
    }
    
</style>
<?php switch($acesso['name']){
case 'COMPRAS' : 
?>
<button id="btn-filtro" class="btn btn-primary">Novo - Filtro</button>
<div class="filtro-data">
    <form method="POST">
        <h2><center>Filtros</center></h2>
        <div class="row">
            <div class="form-group col-xs-4">
                <label>Data Inicial</label>
                <input type="date" name="data1" class="form-control" value="<?php echo date('Y-m-d');?>">
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="form-group col-xs-4">
                <label>Data Final</label> 
                <input type="date" name="data2" class="form-control" value="<?php echo date('Y-m-d');?>"><br><br>  
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="form-group col-xs-4">
                <select name="p_registro" id="p_registro" class="form-control">            
                    <option disabled="" selected>Escolha o tipo</option>            
                    <option value="1">Retira - Recebimento de Mat.</option>
                </select>                 
            </div>
        </div>
    </form>
    
</div>
<div class="tabContentRegistros">    
    <div class="tabBodyRegistros">
        <h3 style="text-align:center; color:blue;">Retira / Recebimento Mat.</h3>
        <table width="100%" class="table table-striped paginated">
            <thead>
                <tr>        
                    <th>Data-Entrada</th>                    
                    <th>Placa</th>    
                    <th>Nome Motorista</th>
                    <th>RG</th>                    
                    <th>Empresa</th>
                    <th>Observações</th>                
                    <th width="180">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records_list as $r): ?>                 
                    <tr>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= date('d/m/Y', strtotime($r['data_er'])). ' - '. $r['hora_er'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['placa_v'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['motorista_v'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['rg'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['empresa_v'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['obs'];?></td> 
                        <?php if($r['flag'] == '1'){ 
                            echo '<td>                                            
                                    <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class=" fa fa-eye"></i></a>
                                    <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class="fa fa-edit"></i></a>
                                    </td>';
                        }else{
                            if(isset($records_edit) && !empty($records_edit)){
                                echo '<td>
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye></i>"</a>
                                <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class=" fa fa-edit></i>"</a>
                                </td>';     
                            }else {
                                echo '<td>                            
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a></td>';
                            }
                       } ?>                              
                    </tr>
                <?php endforeach; ?>
            </tbody>                                
        </table>
    </div>
</div>
<?php
    break;
    default :
?>

    <h3><center>Registros</center></h3>    
    <a class="btn btn-primary" href="<?= BASE_URL ?>/records/add">Adicionar Registro</a><br><br>    
<br><br>
<button id="btn-filtro" class="btn btn-primary">Novo - Filtro</button>
<div class="filtro-data">
    <form method="POST">
        <h2><center>Filtros</center></h2>
        <div class="row">
            <div class="form-group col-xs-4">
                <label>Data Inicial</label>
                <input type="date" name="data1" class="form-control" value="<?php echo date('Y-m-d');?>">
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="form-group col-xs-4">
                <label>Data Final</label> 
                <input type="date" name="data2" class="form-control" value="<?php echo date('Y-m-d');?>"><br><br>  
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="form-group col-xs-4">
                <label>Tipo</label>
                <select name="p_registro" id="p_registro" class="form-control">            
                    <option disabled="" selected>Escolha o tipo</option>            
                    <option value="0">Controle Chaves.</option>
                    <option value="1">Retira - Recebimento de Mat.</option>
                    <option value="2">Entrada Veículos</option>
                </select>                 
            </div>
        </div>       
    </form>
    
</div>
<?php if(isset($records_list) && !empty($records_list) && $records_list['0']['tipo'] == '0'):?>
<div class="tabContentRegistros">    
    <div class="tabBodyRegistros">
        <h2 style="text-align:center; color:blue;">Controle - Chaves</h2>
        <table width="100%" class="table table-striped paginated">
            <thead>
                <tr>        
                    <th>Data-Retirada</th>                                    
                    <th>Colaborador-Retirou</th>                
                    <th>Cod. Chave</th>    
                    <th>Local</th>
                    <th width="180">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records_list as $r): ?>                                   
                    <tr>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>">
                            <?= date('d/m/Y', strtotime($r['data_er'])). " - " .$r['hora_er'];?>
                                
                        </td>
                       
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['colab_ret'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['cod'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['local'];?></td> 
                        <?php if($r['flag'] == '1'){                           
                                echo '<td>        
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class="fa fa-edit"></i></a>
                                </td>';                            
                        }else{
                            if(isset($records_edit) && !empty($records_edit)){
                                echo '<td>
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class="fa fa-edit"></i></a>
                                </td>';     
                            }else {
                                echo '<td>                            
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a></td>';
                            }
                       } ?>                              
                    </tr>
                <?php endforeach; ?>
            </tbody>                                    
        </table>
    </div>
<?php endif; ?>    
<?php if(isset($records_list) && !empty($records_list) && $records_list['0']['tipo'] == '1'): ?>
    <div class="tabBodyRegistros">
        <h2 style="text-align:center; color:blue;">Retira / Recebimento Mat.</h2>
        <table width="100%" class="table table-striped paginated">
            <thead>
                <tr>        
                    <th>Data-Entrada</th>                    
                    <th>Placa</th>    
                    <th>Nome Motorista</th>
                    <th>RG</th>                    
                    <th>Empresa</th>
                    <th>Observações</th>                
                    <th width="180">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records_list as $r): ?>                 
                    <tr>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= date('d/m/Y', strtotime($r['data_er'])). ' - '. $r['hora_er'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['placa_v'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['motorista_v'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['rg'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['empresa_v'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['obs'];?></td> 
                        <?php if($r['flag'] == '1'){ 
                            echo '<td>                                            
                                    <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class="fa fa-edit"></i></a>
                                    </td>';
                        }else{
                            if(isset($records_edit) && !empty($records_edit)){
                                echo '<td>
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class="fa fa-edit"></i></a>
                                </td>';     
                            }else {
                                echo '<td>                            
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye></i>"</a></td>';
                            }
                       } ?>                              
                    </tr>
                <?php endforeach; ?>
            </tbody>                                
        </table>
    </div>
<?php endif; ?>    
<?php if(isset($records_list) && !empty($records_list) && $records_list['0']['tipo'] == '2'): ?>
    <div class="tabBodyRegistros">
        <h2 style="text-align:center;  color:blue;">Entrada - Veículos</h2>
        <table width="100%" class="table table-striped paginated">
            <thead>
                <tr>        
                    <th>Data-Entrada</th>
                    <th>Visitante</th>                    
                    <th>Placa</th>    
                    <th>Nome Motorista</th>
                    <th>RG</th> 
                    <th>Empresa</th>                
                    <th>Observações</th>
                    <th width="180">Ações</th>
                </tr>
            </thead>
            <tbody>               
                <?php foreach($records_list as $r): ?>                 
                    <tr>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= date('d/m/Y', strtotime($r['data_er'])). " - ".$r['hora_er'];?>
                            
                        </td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['visitante'] == '1' ? 'Visitante' : 'Não Visitante';?>
                            
                        </td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= !empty($r['placa']) ? $r['placa'] : $r['placa_v'];?>
                            
                        </td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= !empty($r['motorista']) ? $r['motorista'] : $r['motorista_v'];?>
                            
                        </td>
                         <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= !empty($r['rg']) ? $r['rg'] : 'Funcionario';?>
                            
                        </td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= !empty($r['empresa']) ? $r['empresa'] : $r['empresa_v'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['obs'];?></td> 
                        <?php if($r['flag'] == '1'){ 
                            echo '<td>                                            
                                    <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class="fa fa-edit"></i></a>
                                    </td>';
                        }else{

                            if(isset($records_edit) && !empty($records_edit)){
                                echo '<td>
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-warning" href="'.BASE_URL .'/records/edit/'. $r['id'] .'"><i class="fa fa-edit"></i></a>
                                </td>';     
                            }else {
                                echo '<td>                            
                                <a class="btn btn-primary" href="'.BASE_URL .'/records/view/'. $r['id'] .'"><i class="fa fa-eye"></i></a></td>';
                            }
                       } ?>                              
                    </tr>
                <?php endforeach; ?>                                
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
<?php if(empty($records_list) ) : ?>
    <br><h2><strong>Nenhum Registro encontrado - rever filtro</strong></h2>
<?php endif; ?>





<?php 
    break;
}?>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records.js"></script>