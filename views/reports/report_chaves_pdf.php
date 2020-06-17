<link href="<?= BASE_URL.$stylesheet ?>" rel="stylesheet"/>
 
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
<table  class="table table-striped">
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
</table>