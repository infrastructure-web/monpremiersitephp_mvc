<!-- Affichage en mode "liste" -->
<h2>Affichage en mode "liste"</h2>
<ul>
    <?php foreach ($produits as $produit) {  ?> 
        <li><?= $produit->code ?> (<?= $produit->produit ?>)</li>
    <?php  } ?>
</ul>