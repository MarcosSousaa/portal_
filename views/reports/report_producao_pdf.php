<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<link href="<?= BASE_URL ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/datatables.min.css"/> 
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/buttons.dataTables.min.css"/> 


<fieldset style="font-weight: bold; color:blue;">
    <?php
    if (isset($filters['producao_data_inicial']) && !empty($filters['producao_data_inicial']) && ($filters['producao_data_final']) && !empty($filters['producao_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['producao_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['producao_data_final']))."<br>";
    }
   if (isset($filters['lote']) && !empty($filters['lote'])) {
        echo "Lote Interno: = " . $filters['lote'] . "<br>";
    }
   if (isset($filters['pedido']) && !empty($filters['pedido'])) {
        echo "Nº Pedido: = " . $filters['pedido'] . "<br>";
    }
   if (isset($filters['turno']) && !empty($filters['turno'])) {
        echo "Turno: = " . $turno[$filters['turno']] . "<br>";
    }
    if (isset($filters['ext']) && !empty($filters['ext'])) {
        echo "Extrusora Escolhida: = " . $filters['ext'] . "<br>";
    }
    ?>

</fieldset>
<br />

<table class="table table-striped table-bordered display nowrap" id="tabelaProducao" style="width: 100%;">
    <thead>
        <tr>
            <th>Data Iniciada</th>
            <th>Extrusora</th>                               
            <th>Operador</th>
            <th>Turno</th>            
            <th>Lote</th>                               
            <th>Pedido</th>
            <th>Ordem</th>
            <th>Peso Bob.</th>
            <th>Qtd Prod.</th>
            <th>Total</th>
            <th>Larg</th>
            <th>Esp</th>
            <th>Metrag</th>
            <th>Data Finalizada</th>            

        </tr>
    </thead>            
    <tbody>
    <?php foreach ($producao_list as $producao_item): ?>
        
            <tr>
                <td><?= date('d/m/Y', strtotime($producao_item['data_prod'])).' - '.$producao_item['hri']?></td>
                <td><?= $producao_item['extrusora']?></td>
                <td><?= $producao_item['operador']?></td>
                <td><?= $turno[$producao_item['turno']] ?></td>
                <td><?= $producao_item['lote']?></td>
                <td><?= $producao_item['pedido']?></td>
                <td><?= $producao_item['ordem']?></td>   
                <td><?= number_format($producao_item['pesobob'],3,',','.')?></td>
                <td><?= $producao_item['qtdbob']?></td>
                <td><?= number_format($producao_item['totalbob'],3,',','.')?></td>
                <td><?= $producao_item['larg']?></td>
                <td><?= $producao_item['esp']?></td>
                <td><?= $producao_item['metrag']?></td>
                <td><?= date('d/m/Y', strtotime($producao_item['data_f'])).' - '.$producao_item['hrf']?></td>
                <?php 
                    $totalqtd += $producao_item['qtdbob'];
                    $totalgeral += $producao_item['totalbob'];                    
                ?>                
            </tr>
        <?php endforeach; ?>                        
        </tbody>
        <tfoot>
            <tr>                
                <th>Data Iniciada</th>
                <th>Extrusora</th>                               
                <th>Operador</th>
                <th>Turno</th>            
                <th>Lote</th>                               
                <th>Pedido</th>
                <th>Ordem</th>
                <th>Peso Bob.</th>
                <th>Qtd Prod.</th>
                <th>Total</th>
                <th>Larg</th>
                <th>Esp</th>
                <th>Metrag</th>
                <th>Data Finalizada</th>               
            </tr>
        </tfoot>
</table>
<h3>Quantidade Total de BOB Produzida - <?= $totalqtd ?> UN</h3>
<h3>Total Geral Produzido- <?= number_format($totalgeral,3,',','.') ?> KG</h3>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL ?>/assets/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL ?>/assets/DataTables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL ?>/assets/DataTables/jszip.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL ?>/assets/DataTables/pdfmake.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL ?>/assets/DataTables/vfs_fonts.js"></script>
<script type="text/javascript" src="<?=BASE_URL ?>/assets/DataTables/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL ?>/assets/DataTables/buttons.print.min.js"></script>



<script type="text/javascript">

    $(document).ready(function(){
        $('#tabelaProducao').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha"
                    }
                }
            },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: '<i class="fa fa-external-link" aria-hidden="true"></i>',
                titleAttr: 'Exportar',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<i class="fa fa-clone"" aria-hidden="true"></i>',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: null,
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-text-o" aria-hidden="true"></i>',
                        titleAttr: 'Csv'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                        orientation: 'landscape',
                        title: null,
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print" aria-hidden="true"></i>',
                        title: '',
                        titleAttr: 'Imprimir',
                        customize: function(win){
                            var last = null;
                            var current = null;
                            var bod = [];
                            var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');
                            style.type = 'text/css';
                            style.media = 'print'; 
                            if (style.styleSheet){
                                style.styleSheet.cssText = css;
                            }else{
                                style.appendChild(win.document.createTextNode(css));
                            }
                            head.appendChild(style);
                        }
                    }
                    
                ]
            }]

        }); // ID From dataTable   

    });


    
</script>
