<!-- Affichage en mode "liste" -->
<h2>Affichage en mode "liste"</h2>
<ul>
    <?php foreach ($produits as $produit) {  ?> 
        <li><?= $produit->nom ?> (<?= $produit->qte_stock ?>)</li>
    <?php  } ?>
</ul>