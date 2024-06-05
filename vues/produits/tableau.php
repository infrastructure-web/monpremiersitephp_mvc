<!-- Affichage en mode "tableau" -->
<h2>Affichage en mode "tableau"</h2>
<table>
    <tr>
        <th>nom</th>
        <th>prix</th>
        <th>quantité</th>
    </tr>

    <?php
        foreach ($produits as $produit) {
    ?>
        <tr>
            <td><?= $produit->nom?></td>
            <td><?= $produit->prix_vente ?></td>
            <td><?= $produit->qte_stock ?></td>
        </tr>
    <?php
        }
    ?>
</table>