<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
<link href="<?= BASE_URL ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/datatables.min.css"/> 
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>/assets/DataTables/buttons.dataTables.min.css"/> 
<fieldset style="font-weight: bold; color:blue;">
    <?php
    if (isset($filters['limpeza_data_inicial']) && !empty($filters['limpeza_data_inicial']) && ($filters['limpeza_data_final']) && !empty($filters['limpeza_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['limpeza_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['limpeza_data_final']))."<br>";
    }
   if (isset($filters['dep']) && !empty($filters['dep'])) {
        echo "Departamento: = " . $departamento[$filters['dep']] . "<br>";
    }
   if (isset($filters['maq']) && !empty($filters['maq'])) {
        echo "Maquina: = " . $maquina[$filters['maq']] . "<br>";
    }
   if (isset($filters['operador']) && !empty($filters['operador'])) {
        echo "Nome Operador: = " . $filters['operador'] . "<br>";
    }
    ?>

</fieldset>
<br />

<table class="table table-striped table-bordered display nowrap" id="tabelaLimpeza" style="width: 100%;">
    <thead>
        <tr>
            <th>Data Limpeza</th>
            <th>Departamento</th>                               
            <th>Maquina</th>
            <th>Operador</th>            
            <th>Estrutura</th>                               
            <th>Proteção</th>
            <th>Paínel</th>
            <th>Chão</th>
            <th>Aprovação</th>
            <th>Produtos Usados</th>
            <th>Obs</th>            
        </tr>
    </thead>
    <tbody>            
        <?php foreach ($limpeza_list as $limpeza_item): ?>
            <?php
            $aprovacao= $limpeza_item['valid'];              
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
        <tr>
            <td><?= date('d/m/Y', strtotime($limpeza_item['data_limp'])).' - '.$limpeza_item['hrlimp']?></td>
            <td><?= $departamento[$limpeza_item['departamento']]?></td>
            <td><?= $maquina[$limpeza_item['maquina']]?></td>
            <td><?= $limpeza_item['operador'] ?></td>
            <td><?= ($limpeza_item['estrutura'] == '1') ? 'Conforme' : 'Não Conforme';?></td>
            <td><?= ($limpeza_item['protecao'] == '1') ? 'Conforme' : 'Não Conforme';?></td>
            <td><?= ($limpeza_item['painel'] == '1') ? 'Conforme' : 'Não Conforme';?></td>   
            <td><?= ($limpeza_item['chao'] == '1') ? 'Conforme' : 'Não Conforme';?></td>
            <td><?= $aprovacao?></td>
            <td><?= $limpeza_item['prod']?></td>
            <td><?= $limpeza_item['obs']?></td>
        </tr>            
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Data Limpeza</th>
            <th>Departamento</th>                               
            <th>Maquina</th>
            <th>Operador</th>            
            <th>Estrutura</th>                               
            <th>Proteção</th>
            <th>Paínel</th>
            <th>Chão</th>
            <th>Aprovação</th>
            <th>Produtos Usados</th>
            <th>Obs</th>            
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
        $('#tabelaLimpeza').DataTable({
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