<!-- Affichage en mode "tableau" -->
<h2>Affichage en mode "tableau" avec les options ajouter, afficher, modifier et supprimer</h2>
<table>
    <tr>       
        <th>Nom du produit</th>        
        <th>Prix de vente</th>        
        <th>Quantité en stock</th>
        <th>Actions</th>
    </tr>

    <?php
        foreach ($produits as $produit) {
    ?>
        <tr>
            <td><?= $produit->nom?></td>
            <td><?= $produit->prix_vente ?></td>
            <td><?= $produit->qte_stock ?></td>
            <td>
                <a href="fiche_produit.php?id=<?= $produit->id ?>">Afficher</a>
                | 
                <a href="edition_produit.php?id=<?= $produit->id ?>">Modifier</a> 
                | 
                <a href="suppression_produit.php?id=<?= $produit->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php
        }
    ?>
</table>