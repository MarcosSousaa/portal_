<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<link href="<?= BASE_URL ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/datatables.min.css"/> 
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/buttons.dataTables.min.css"/> 
<fieldset style="font-weight: bold; color:blue;">
    <?php
    if (isset($filters['perda_data_inicial']) && !empty($filters['perda_data_inicial']) && ($filters['perda_data_final']) && !empty($filters['perda_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['perda_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['perda_data_final']))."<br>";
    }
    if (isset($filters['turno']) && !empty($filters['turno'])) {
        echo "Turno: = " . $turno[$filters['turno']] . "<br>";
    }
   
    ?>

</fieldset>
<br />

<table class="table table-striped table-bordered display nowrap" id="tabelaPerda" style="width: 100%;">
    <thead>
        <tr>
            <th>Data</th>
            <th>Turno</th>   
            <th>Setor</th> 
            <th>Maquina</th>            
            <th>Produto</th>
            <th>Apara</th>                               
            <th>Refile</th>
            <th>Borra</th>
            <th>Acabamento</th>
            <th>Qtd Parada.</th>
            <th>Tempo Parada</th>
            <th>OC</th>            

        </tr>
    </thead>
    <tbody>            
    <?php foreach ($perda_list as $perda_item): ?>
        <tr>
            <td><?= date('d/m/Y', strtotime($perda_item['data_perd']));?></td>
            <td><?= $turno[$perda_item['turno']]; ?></td>
            <td><?= $departamento[$perda_item['departamento']]; ?></td>
            <td><?= $maquina[$perda_item['maquina']]; ?></td>
            <td><?= $produto[$perda_item['produto']]; ?></td>                
            <td><?= number_format($perda_item['apara'],3,',','.');?>
            </td>
            <td><?= number_format($perda_item['refile'],3,',','.');?>
            </td>
            <td><?= number_format($perda_item['borra'],3,',','.');?>
            </td>
            <td><?= number_format($perda_item['acabamento'],3,',','.');?>
            </td>
            <td><?= $perda_item['qtdparada'];?></td>
            <td><?= $perda_item['tempoparada'];?></td>
            <td><?= $perda_item['oc'];?></td>
            <?php 
                $apara = $apara + $perda_item['apara'];
                $refile = $refile + $perda_item['refile'];
                $borra = $borra + $perda_item['borra'];
                $acabamento = $acabamento + $perda_item['acabamento'];                    
            ?>
        </tr>
    <?php endforeach; ?>                        
    </tbody>
    <tfoot>
        <tr>
            <th>Data</th>
            <th>Turno</th>   
            <th>Setor</th> 
            <th>Maquina</th>            
            <th>Produto</th>
            <th>Apara</th>                               
            <th>Refile</th>
            <th>Borra</th>
            <th>Acabamento</th>
            <th>Qtd Parada.</th>
            <th>Tempo Parada</th>
            <th>OC</th>            

        </tr>
    </tfoot>
</table>
<h3>Total Apara - <?= number_format($apara,3,',','.'); ?></h3>
<h3>Total Refile - <?= number_format($refile,3,',','.'); ?></h3>
<h3>Total Borra - <?= number_format($borra,3,',','.'); ?></h3>
<h3>Total Acabamento - <?= number_format($acabamento,3,',','.'); ?></h3>

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
        //$('#tabelaChaves').DataTable();
        $('#tabelaPerda').DataTable({
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
            },{
                extend: 'pageLength',                                
                
            }]
        }); // ID From dataTable       
    });
    
</script>



