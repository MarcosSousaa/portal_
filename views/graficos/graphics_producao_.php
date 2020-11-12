<?php    
    
    //$t_prod = implode('', $total_producao);
    //$t_perda = implode('', $total_perda);
    foreach($total_producao as $tot_producao => $producao):
        $t_prod = $t_prod + $producao;
    endforeach; 
    foreach($total_perda as $tot_perda => $perda):
        $t_perda = $t_perda + $perda;
    endforeach; 
    foreach($total_perda_apara as $perda_apara => $apara):
        $t_apara = $t_apara + $apara;
    endforeach;
    foreach($total_perda_refile as $perda_refile => $refile):
        $t_refile = $t_refile + $refile;
    endforeach;
    foreach($total_perda_borra as $perda_borra => $borra):
        $t_borra = $t_borra + $borra;
    endforeach;
    foreach($total_perda_acabamento as $perda_acabamento => $acabamento):
        $t_acabamento = $t_acabamento + $acabamento;
    endforeach;   

 ?>
<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<h3>Filtro solicitado - <?=date('d/m/Y',strtotime($data1));?> Até <?=date('d/m/Y',strtotime($data2));?></h3>
<div id="reportPage">
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">        
        <div class="db-info">
            <div class="db-info-title">Gráfico de Produção e Perda Geral - <?=$dias; ?> Dias</div>            
            <div class="db-info-body">
                <section>
                    <canvas id="graf1"></canvas>    
                    <table class="table table-striped">
                        <tr>
                            <th>Produção</th>
                            <th>Perda</th>
                        </tr>
                        <tr>
                            <td><?= number_format($t_prod,3,',','.');?></td>
                            <td><?= number_format($t_perda,3,',','.') ;?></td>
                        </tr>
                    </table>            
                </section>                
            </div>
        </div>
        
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">        
        <div class="db-info">
            <div class="db-info-title">Grafico de Produção e Perda Por Extrusora - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <section>
                    <canvas id="graf2"></canvas>
                    <table class="table table-striped">
                    <tr>
                        <th colspan="2">Extrusora 01</th>
                        <th colspan="2">Extrusora 02</th>
                        <th colspan="2">Extrusora 03</th>
                        <th colspan="2">Extrusora 04</th>
                        <th colspan="2">Extrusora 05</th>
                    </tr>
                    <tr>
                        <td>Produção</td>
                        <td>Perda</td>
                        <td>Produção</td>
                        <td>Perda</td>
                        <td>Produção</td>
                        <td>Perda</td>
                        <td>Produção</td>
                        <td>Perda</td>
                        <td>Produção</td>
                        <td>Perda</td>
                    </tr>
                    <tr>
                        <td><?= number_format($total_producao_ext['01'],3,',','.');?></td>
                        <td><?= number_format($total_perda_ext['EXT01'],3,',','.');?></td>
                        <td><?= number_format($total_producao_ext['02'],3,',','.');?></td>
                        <td><?= number_format($total_perda_ext['EXT02'],3,',','.');?></td>
                        <td><?= number_format($total_producao_ext['03'],3,',','.');?></td>
                        <td><?= number_format($total_perda_ext['EXT03'],3,',','.');?></td>
                        <td><?= number_format($total_producao_ext['04'],3,',','.');?></td>
                        <td><?= number_format($total_perda_ext['EXT04'],3,',','.');?></td>                        
                        <td><?= number_format($total_producao_ext['05'],3,',','.');?></td>
                        <td><?= number_format($total_perda_ext['EXT05'],3,',','.');?></td>                        
                    </tr>
                </table>
                </section>
            </div>
        </div>
        
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">
        <div class="db-info">
            <div class="db-info-title">Grafico de Produção e Perda Por Turno - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <section>
                    <canvas id="graf3"></canvas>
                    <table class="table table-striped">
                        <tr>
                            <th colspan="2">MANHA</th>
                            <th colspan="2">TARDE</th>
                            <th colspan="2">NOITE</th>                
                        </tr>
                        <tr>
                            <td>Produção</td>
                            <td>Perda</td>
                            <td>Produção</td>
                            <td>Perda</td>
                            <td>Produção</td>
                            <td>Perda</td>                
                        </tr>
                        <tr>
                            <td><?= number_format($total_producao_turno['001'],3,',','.');?></td>
                            <td><?= number_format($total_perda_turno['001'],3,',','.');?></td>
                            <td><?= number_format($total_producao_turno['002'],3,',','.');?></td>
                            <td><?= number_format($total_perda_turno['002'],3,',','.');?></td>
                            <td><?= number_format($total_producao_turno['003'],3,',','.');?></td>
                            <td><?= number_format($total_perda_turno['003'],3,',','.');?></td>                
                        </tr>
                    </table>
                </section>
            </div>
        </div>
        
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">
        <div class="db-info">
            <div class="db-info-title">Grafico de Produção Por Operador - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <section>
                    <canvas id="graf4"></canvas>
                     <table>
                        <tr>
                            <th>Operador</th>
                            <th>Total Prod.</th>                
                        </tr>
                        <?php foreach($operador as $op_prod => $op) : ?> :            
                        <tr>
                            <td><?= $op  ?></td>
                            <td><?= number_format($op_prod,3,',','.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>    
                </section>
                
            </div>
        </div>       
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">
        <div class="db-info">
            <div class="db-info-title">Grafico de Perda Por Analitica - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <section>
                    <canvas id="graf5"></canvas>
                     <table class="table table-striped">
                        <tr>
                            <th>Apara</th>
                            <th>Refile</th>
                            <th>Borra</th>                
                            <th>Acabamento</th>
                        </tr> 
                        <tr>
                            <td><?= number_format($t_apara,3,',','.');?></td>
                            <td><?= number_format($t_refile,3,',','.');?></td>
                            <td><?= number_format($t_borra,3,',','.');?></td>
                            <td><?= number_format($t_acabamento,3,',','.');?></td>
                        </tr>
                    </table>   
                </section>
                
            </div>
        </div>       
    </div>
</div>
</div>
<script type="text/javascript">
    var dias = <?php echo json_encode($days_list); ?>;
    var total_producao = <?php echo json_encode(array_values($total_producao)); ?>;

    var total_perda = <?php echo json_encode(array_values($total_perda)); ?>;

    var turno =  <?php echo json_encode(array_values($turno)); ?>;

    var extrusora =  <?php echo json_encode(array_values($maquina)); ?>;

    var total_producao_ext = <?php echo json_encode(array_values($total_producao_ext)); ?>;

    var total_perda_ext = <?php echo json_encode(array_values($total_perda_ext)); ?>;

    var total_producao_turno = <?php echo json_encode(array_values($total_producao_turno)); ?>;

    var total_perda_turno = <?php echo json_encode(array_values($total_perda_turno)); ?>;           
    var op = <?php echo json_encode(array_values($operador)); ?>;    

    var total_producao_op = <?php echo json_encode(array_values($total_producao_op));?>;

    var total_perda_apara = <?php echo json_encode(array_values($total_perda_apara));?>;

    var total_perda_refile = <?php echo json_encode(array_values($total_perda_refile));?>;

    var total_perda_borra = <?php echo json_encode(array_values($total_perda_borra));?>;

    var total_perda_acabamento = <?php echo json_encode(array_values($total_perda_acabamento));?>;      

</script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/Chart.min.js">
</script>
<script type="text/javascript" src="<?= BASE_URL ?>
/assets/js/script_graficos.js">
</script>
