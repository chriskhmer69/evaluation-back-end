<!DOCTYPE html>
<html>
<head>
    <title>Consulter tous les produits</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="/index.php">Accueil</a></li>
            <li><a href="/add_product.php">Ajouter un produit</a></li>
            <li><a href="/view_all_products.php">Consulter tous les produits</a></li>
        </ul>
    </nav>
    <section>
        <div class="container">
            <?php
            require_once 'config.php';

            $sql = "SELECT * FROM produit ORDER BY id_produit DESC";
            $stmt = $pdo->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product' ".($row['reservation_text'] ? "style='opacity: 0.5;'" : "").">";
                echo "<h2>".strtoupper($row['title'])."</h2>";
                echo "<img src='uploads/".$row['image']."' alt='".$row['title']."'>";
                echo "<p>".$row['description']."</p>";
                echo "<p>".$row['price']." €</p>";
                echo "<p>".$row['city'].", ".$row['postal_code']."</p>";
                echo "<a href='view_product.php?id=".$row['id_produit']."'>Voir le produit</a>";
                echo $row['reservation_text'] ? "<p>Réservé</p>" : "";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</body>
</html>
