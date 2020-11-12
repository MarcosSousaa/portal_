<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<link href="<?= BASE_URL ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/datatables.min.css"/> 
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/buttons.dataTables.min.css"/> 
<fieldset>
    <?php
    if (isset($filters['chave_name']) && !empty($filters['chave_name'])) {
        echo "Filtrado pelo nome da chave: " . $filters['chave_name'] . "<br>";
    }
   if (isset($filters['local_name']) && !empty($filters['local_name'])) {
        echo "Filtrado pelo local da chave: " . $filters['local_name'] . "<br>";
    }
    ?>

</fieldset>
<br />
<table  class="table table-striped table-bordered display nowrap" id="tabelaChaves" style="width: 100%;">
    <thead>
        <tr>
            <th>Codígo</th>                
            <th>Local</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($chave_list as $chave_item): ?>
        <tr>
            <td><?= $chave_item['cod'] ?></td>
            <td><?= $chave_item['local'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Codígo</th>                
            <th>Local</th>
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
        $('#tabelaChaves').DataTable({
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
                    }
                    
                ]
            },
            {
                extend: 'pageLength',                                
                
            }]
        }); // ID From dataTable       
    });
    
</script>
