<!-- Affichage en mode "tableau" -->
<h2>Affichage en mode "tableau"</h2>
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