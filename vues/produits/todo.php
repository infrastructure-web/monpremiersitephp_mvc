<!-- Affichage en mode "bloc" -->
    <h1>Affichage en mode "liste"</h1>
    <?php
        $result = $mysqli->query("SELECT code, produit, prix_vente, qte_stock FROM produits ORDER BY code");

        foreach ($result as $row) {
    ?>
        <h2><?= $row['produit'] ?> : <?= $row['code'] ?></h2>
        <p>Quantité en stock : <?= $row['qte_stock'] ?></p>
        <p>Prix de vente : <?= $row['prix_vente'] ?></p>
    <?php
        }
    ?>

    <!-- Affichage en mode "liste" -->
    <h1>Affichage en mode "liste"</h1>
    <ul>

        <?php
            $result = $mysqli->query("SELECT code, produit, prix_vente, qte_stock FROM produits ORDER BY code");

            foreach ($result as $row) {
        ?>
            <li><?= $row['produit'] ?> (<?= $row['code'] ?>)</li>
        <?php
            }
        ?>
    </ul>

    <!-- Affichage en mode "tableau" -->
    <h1>Affichage en mode "tableau"</h1>
    <table>

        <?php
            $result = $mysqli->query("SELECT code, produit, prix_vente, qte_stock FROM produits ORDER BY code");

            foreach ($result as $row) {
        ?>
            <tr>
                <td><?= $row['code'] ?></td>
                <td><?= $row['produit'] ?></td>
                <td><?= $row['prix_vente'] ?></td>
                <td><?= $row['qte_stock'] ?></td>
            </tr>
        <?php
            }
        ?>
    </table>