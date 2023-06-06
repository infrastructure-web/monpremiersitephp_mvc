<div class="container">
    <h1>Éditer un produit</h1>
    <form method="POST">
        <div>
            <div>
                <label for="code">Code *</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="text" id="code" name="code" required maxlength="25" value="<?= $produit->code ?>">
            </div>
            <div>
                <label for="nom">Nom du produit *</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="text" id="nom" name="nom" required minlength="2" maxlength="50" value="<?= $produit->produit ?>">
            </div>
        </div>

        <div>
            <div>
                <label for="prix_unitaire">Prix unitaire (coûtant) *</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="number" step=".01" id="prix_unitaire" name="prix_unitaire" required value="<?= $produit->prix_unitaire ?>">
            </div>
            <div>
                <label for="prix_vente">Prix de vente *</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="number" step=".01" id="prix_vente" name="prix_vente" required value="<?= $produit->prix_vente ?>">
            </div>
            <div>
                <label for="qte_stock">Quantité en stock</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="number" id="qte_stock" name="qte_stock" required value="<?= $produit->qte_stock ?>">
            </div>
        </div>

        <button name="boutonEditer" type="submit">Modifier le produit</button><br>
    </form>                         
</div>