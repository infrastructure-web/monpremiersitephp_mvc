<!-- Affichage en mode "tableau" -->
<h1>Affichage en mode "tableau"</h1>
<table>

    <?php
        foreach ($produits as $produit) {
    ?>
        <tr>
            <td><?= $produit->code ?></td>
            <td><?= $produit->produit?></td>
            <td><?= $produit->prix_vente ?></td>
            <td><?= $produit->qte_stock ?></td>
        </tr>
    <?php
        }
    ?>
</table>