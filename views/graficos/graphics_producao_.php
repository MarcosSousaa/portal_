<?php    
    
    $t_prod = implode('', $total_producao);
    $t_perda = implode('', $total_perda); 
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
                <canvas id="graf1"></canvas>                
            </div>
        </div>
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
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">        
        <div class="db-info">
            <div class="db-info-title">Grafico de Produção e Perda Por Extrusora - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <canvas id="graf2"></canvas>
                
            </div>
        </div>
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
                <td><?= number_format($total_perda_ext['01'],3,',','.');?></td>
                <td><?= number_format($total_producao_ext['02'],3,',','.');?></td>
                <td><?= number_format($total_perda_ext['02'],3,',','.');?></td>
                <td><?= number_format($total_producao_ext['03'],3,',','.');?></td>
                <td><?= number_format($total_perda_ext['03'],3,',','.');?></td>
                <td><?= number_format($total_producao_ext['04'],3,',','.');?></td>
                <td><?= number_format($total_perda_ext['04'],3,',','.');?></td>                        
                <td><?= number_format($total_producao_ext['05'],3,',','.');?></td>
                <td><?= number_format($total_perda_ext['05'],3,',','.');?></td>                        
            </tr>
        </table>
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">
        <div class="db-info">
            <div class="db-info-title">Grafico de Produção e Perda Por Turno - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <canvas id="graf3"></canvas>
            </div>
        </div>
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
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">
        <div class="db-info">
            <div class="db-info-title">Grafico de Produção Por Operador - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <canvas id="graf4"></canvas>
            </div>
        </div>
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
    </div>
</div>
<div class="row db-row row-two">
    <div class="col-xl-6 col-md-6 mb-4 grid-2">
        <div class="db-info">
            <div class="db-info-title">Grafico de Perda Por Analitica - <?=$dias; ?> Dias</div>
            <div class="db-info-body">
                <canvas id="graf5"></canvas>
            </div>
        </div>
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
    </div>
</div>
</div>
<button class="btn btn-danger downloadPdf">Gera PDF <i class="fa fa-file-pdf-o"></i></button>
<script type="text/javascript">
    var dias = <?php echo json_encode($days_list); ?>;
    var total_producao = <?php echo json_encode(array_values($total_producao)); ?>;

    var total_perda = <?php echo json_encode(array_values($total_perda)); ?>;

    var turno =  <?php echo json_encode(array_values($turno)); ?>;

    var extrusora =  <?php echo json_encode(array_values($extrusora)); ?>;

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('.downloadPdf').click(function(event) {
  // get size of report page
  var reportPageHeight = $('#reportPage').innerHeight();
  var reportPageWidth = $('#reportPage').innerWidth();
  
  // create a new canvas object that we will populate with all other canvas objects
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  // keep track canvas position
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 0;
  var pdfctxY = 0;
  var buffer = 100;
  
  // for each chart.js chart
  $("canvas").each(function(index) {
    // get the chart height/width
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
    // draw the chart into the new canvas
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    // our report page is in a grid pattern so replicate that in the new canvas
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  // create new pdf and add our new canvas as an image
  var pdf = new jsPDF('R', 'pt', [reportPageWidth, reportPageHeight]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  // download the pdf
  pdf.save('filename.pdf');
});
</script>