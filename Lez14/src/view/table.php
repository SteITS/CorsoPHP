<table>
    <tr>
        <th>name</th>
        <th>description</th>
        <th>price</th>
        <th>image</th>
    </tr>

    <?php foreach ($prodotti as $prodotto): ?>
        <tr>
        <td><?=$prodotto->name?></td>
        <td><?=$prodotto->description?></td>
        <td><?=$prodotto->price?></td>
        <td><img src="<?=$prodotto->image?>" alt="<?=$prodotto->image?>"></td>
    </tr>
    <?php endforeach;  ?>

</table>