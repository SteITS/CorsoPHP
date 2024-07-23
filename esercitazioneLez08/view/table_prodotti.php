<?php
include("../repos/ProdottoDAO.php");

$dao = new prodottoDAO();

?>

<table>
    <tr>
        <th>Nome</th>
        <th>Prezzo</th>
    </tr>

    <?php foreach ($dao->getProdotti() as $prodotto) : ?>
    <tr>
        <td><?=$prodotto->nome?></td>
        <td><?=$prodotto->prezzo?></td>
    </tr>
    <?php endforeach; ?>
</table>