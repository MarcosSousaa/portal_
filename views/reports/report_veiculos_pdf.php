<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<link href="<?= BASE_URL ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/datatables.min.css"/> 
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/buttons.dataTables.min.css"/> 
<fieldset>
    <?php
    if (isset($filters['veiculo_motorista']) && !empty($filters['veiculo_motorista'])) {
        echo "Filtrado pelo nome do motorista: " . $filters['veiculo_motorista'] . "<br>";
    }
   if (isset($filters['veiculo_empresa']) && !empty($filters['veiculo_empresa'])) {
        echo "Filtrado pelo nome da empresa: " . $filters['veiculo_empresa'] . "<br>";
    }
   if (isset($filters['veiculo_placa']) && !empty($filters['veiculo_placa'])) {
        echo "Filtrado pelo placa do veiculo: " . $filters['veiculo_placa'] . "<br>";
    }
   if (isset($filters['status']) && !empty($filters['status'])) {
        echo "Filtrado pelo status do veiculo: " . $filters['status'] . "<br>";
    }
   if (isset($filters['tipo']) && !empty($filters['tipo'])) {
        echo "Filtrado pelo tipo do veiculo: " . $filters['tipo'] . "<br>";
    }
    ?>

</fieldset>
<br>

<table class="table table-striped table-bordered display nowrap" id="tabelaVeiculos" style="width: 100%;">
    <thead>
        <tr>
            <th>Tipo</th>                
            <th>Motorista</th>                
            <th>Placa</th>                
            <th>Empresa</th>                
            <th>Status</th>                
        </tr>
    </thead>    
    <tbody>    
    <?php foreach ($veiculo_list as $veiculo_item): ?>        
        <tr>
            <td><?= $veiculo_item['tipo'] ?></td>
            <td><?= $veiculo_item['motorista'] ?></td>
            <td><?= $veiculo_item['placa'] ?></td>
            <td><?= $veiculo_item['empresa'] ?></td>
            <td><?= ($veiculo_item['status'] == 'A' ? 'Ativo': 'Inativo') ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Tipo</th>                
            <th>Motorista</th>                
            <th>Placa</th>                
            <th>Empresa</th>                
            <th>Status</th>                
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
        $('#tabelaVeiculos').DataTable({
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
                        titleAttr: 'Imprimir'                        
                    }
                    
                ]
            }]
        }); // ID From dataTable   

    });


    
</script>
