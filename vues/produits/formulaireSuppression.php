<div class="card">
  <img src="https://picsum.photos/200" alt="une photo aléatoire">
  <div class="container">
    <h3><b>Nom du produit : <?= $produit->produit ?></b></h3>
    <h4>Prix de vente: <?= $produit->prix_vente ?>$</h4>
  </div>
</div>

<form method="POST">
    <button name="boutonSupprimer" type="submit">Supprimer le produit</button><br>
</form>