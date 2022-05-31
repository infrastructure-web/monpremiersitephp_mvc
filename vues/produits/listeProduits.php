<!-- Affichage en mode "liste" -->
<h1>Affichage en mode "liste"</h1>
<ul>
         <?php foreach ($produits as $produit) {  ?> 
        <li><?= $produit->code ?> (<?= $produit->produit ?>)</li>
    <?php  } ?>
</ul>