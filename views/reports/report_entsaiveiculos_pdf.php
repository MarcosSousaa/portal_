<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<link href="<?= BASE_URL ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/datatables.min.css"/> 
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/buttons.dataTables.min.css"/>
<fieldset>
    <?php
    if (isset($filters['ent_sai_data_inicial']) && !empty($filters['ent_sai_data_inicial']) && ($filters['ent_sai_data_final']) && !empty($filters['ent_sai_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['ent_sai_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['ent_sai_data_final']))."<br>";
    }
   if (isset($filters['ent_sai_placa']) && !empty($filters['ent_sai_placa'])) {
        echo "Filtrado pelo nome placa do veículo: " . $filters['ent_sai_placa'] . "<br>";
    }
   if (isset($filters['ent_sai_motorista']) && !empty($filters['ent_sai_motorista'])) {
        echo "Filtrado pelo nome do motorista: " . $filters['ent_sai_motorista'] . "<br>";
    }
   if (isset($filters['ent_sai_empresa']) && !empty($filters['ent_sai_empresa'])) {
        echo "Filtrado pelo nome da empresa do veículo: " . $filters['ent_sai_empresa'] . "<br>";
    }
    ?>

</fieldset>
<br />

<table class="table table-striped table-bordered display nowrap" id="tabelaEntSaiVeiculos" style="width: 100%;">
    <thead>
        <tr>
            <th>Visitante</th>
            <th>Entrada</th>                                          
            <th>Placa </th> 
            <th>Motorista</th>
            <th>RG</th>
            <th>Empresa</th>                               
            <th>Intervalo</th>
            <th>Saída</th>
            <th>Obs.</th>

        </tr>
    </thead>            
    <tbody>
    <?php foreach ($records_list as $records_item): ?>        
        <tr>
            <td><?= $records_item['visitante'] == '1' ? "Sim" : "Não";?></td>
            <td><?= date('d/m/Y',strtotime($records_item['data_er'])). ' - '. substr($records_item['hora_er'], 0, -3)?></td>                
            <td><?= !empty($records_item['placa']) ? $records_item['placa'] : $records_item['placa_v']; ?></td>
            <td><?= !empty($records_item['motorista']) ? $records_item['motorista'] : $records_item['motorista_v']; ?></td>
            <td><?= !empty($records_item['rg']) ? $records_item['rg'] : "Funcionario";?></td>
            <td><?= !empty($records_item['empresa']) ? $records_item['empresa'] : $records_item['empresa_v'] ?></td>
            <td>
                <?= !empty($records_item['hr_int_en']) ? $records_item['hr_int_sai']. " Até ". $records_item['hr_int_en'] : " Sem Intervalo" ?>
                
            </td>   
            <td><?= !empty($records_item['data_sr']) ? date('d/m/Y',strtotime($records_item['data_sr'])). ' - '. substr($records_item['hora_sr'], 0, -3) : " Sem saída" ?>
                
            </td>
            <td><?= $records_item['obs']?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Visitante</th>
            <th>Entrada</th>                                          
            <th>Placa </th> 
            <th>Motorista</th>
            <th>RG</th>
            <th>Empresa</th>                               
            <th>Intervalo</th>
            <th>Saída</th>
            <th>Obs.</th>

        </tr>
    </tfoot>            
</table>

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
        $('#tabelaEntSaiVeiculos').DataTable({
            "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
            dom: 'Bfrtip',
            buttons:   [{
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
                
            }
                                
            ],
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
            }
        }); // ID From dataTable       
    });
    
</script>