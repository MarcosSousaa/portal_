<h3><center>Menu</center></h3>
<hr>
<table classs="table table-striped table-bordered display nowrap" id="tabelaMenu" style="width: 100%;">
    <thead>
        <tr>        
            <th>Classe CSS do menu</th>        
            <th>Caminho Menu</th>        
            <th>Descrição</th>        
        </tr>
    </thead>
    <tbody>
        <?php foreach ($menu_list as $m): ?>
            <tr>            
                <td><?= $m['className'] ?></td>
                <td><?= $m['caminho'] ?></td>
                <td><?= $m['descricao'] ?></td>            
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!--<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_veiculos.js"></script> -->
