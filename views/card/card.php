<h3><center>Card</center></h3>

<a class="btn btn-primary" href="<?= BASE_URL ?>/operador/add">Adicionar Card</a>
<hr>
<table width="100%" class="table table-striped paginated">
    <thead>
        <tr>        
            <th>Origem</th>        
            <th>link</th>        
            <th>img</th>        
            <th>Titulo</th>        
        </tr>
    </thead>
    <tbody>
    <?php foreach ($card_list as $c): ?>
        <tr>
            <td><?= $c['origem'] ?></td>            
            <td><?= $c['link'] ?></td>            
            <td><img src="<?= BASE_URL.$c['img'] ?>" class="img-fluid img-thumbnail" alt="img" height="80" width="80"></td>            
            <td><?= $c['titulo'] ?></td>            
            <td>
                <a class="btn btn-primary" href="<?= BASE_URL ?>/card/view/<?= $c['id'] ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-warning" href="<?= BASE_URL ?>/card/edit/<?= $c['id'] ?>"><i class="fa fa-edit"></i></a>                
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

