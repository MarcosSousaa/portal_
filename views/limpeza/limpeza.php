<style type="text/css">
    
    input[type="date"]{
        width: 200px;
    }

</style>
<h3><center>Limpeza Maquina</center></h3>
<a class="btn btn-primary" href="<?= BASE_URL ?>/limpeza/add">Adicionar Limpeza Maq.</a>
<hr />
<div class="filtro-data">
    <form method="POST" class="form-search">
        <fieldset>
            <span>Novo Filtro de Data</span> 
            <div class="form-group">
                <input type="date" name="data1" class="form-control" value="<?php echo date('Y-m-d');?>">            
            <span>Até</span>    
            <input type="date" name="data2" class="form-control" value="<?php echo date('Y-m-d');?>">    
            </div>     
            
            <button id="btnPesquisaFiltro" class="btn btn-primary">Pesquisar</button>       
        </fieldset>
    </form>    
</div>
<hr>
    <table classs="table table-striped table-bordered display nowrap" id="tabelaLimpeza" style="width: 100%;">
        <thead>
            <tr>        
                <th width="130">Data</th> 
                <th>Dep.</th>
                <th>Maq.</th>        
                <th>Operador</th>
                <th>Estrutura</th>
                <th>Proteção</th>
                <th>Painel</th>
                <th>Chão</th>
                <th>Aprovação Qualidade</th>
                <th width="180">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($limpeza_list as $l) : ?> 
            <tr>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= date('d/m/Y', strtotime($l['data_limp'])). ' - '. $l['hrlimp'];?>
                </td>                
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?=$departamento[$l['departamento']] ;?>
                </td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?=$maquina[$l['maquina']] ;?>
                </td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?=$l['operador'] ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['estrutura'] == '1') ? 'Conf.' : 'Não Conf.' ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['protecao'] == '1') ? 'Conf.' : 'Não Conf.' ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['painel'] == '1') ? 'Conf.' : 'Não Conf.' ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['chao'] == '1') ? 'Conf.' : 'Não Conf.' ;?></td>
                <?php 
                    $aprovacao = $l['valid'];
                    if($aprovacao != '1' && $aprovacao != '2'){
                        $aprovacao = 'Em Analíse Pelo Dep. Qualidade';
                    }
                    if($aprovacao == '2'){
                        $aprovacao = 'Reprovado Pelo Dep. Qualidade';
                    }
                    if($aprovacao == '1'){
                        $aprovacao = 'Aprovado Pelo Dep. Qualidade';
                    }
                ?>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $aprovacao ;?></td>
                <td>                    
                    <a class="btn btn-primary" href="<?= BASE_URL ?>/limpeza/view/<?= $l['id'] ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning" href="<?= BASE_URL ?>/limpeza/edit/<?= $l['id'] ?>"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <?php endforeach;  ?> 
        </tbody>
</table>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_limpeza.js"></script>