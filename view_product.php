<!DOCTYPE html>
<html>
<head>
    <title>Consulter un produit</title>
    <script src="script.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="add_product.php">Ajouter un produit</a></li>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="view_all_products.php">Consulter tous les produits</a></li>
        </ul>
    </nav>
    <section>
        <div class="container">
            <?php
            require_once 'config.php';

            $id = $_GET['id'];
            $sql = "SELECT * FROM produit WHERE id_produit = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            echo "<div class='product'>";
            echo "<h2>".strtoupper($row['title'])."</h2>";
            echo "<img src='uploads/".$row['image']."' alt='".$row['title']."'>";
            echo "<p>".$row['description']."</p>";
            echo "<p>".$row['price']." €</p>";
            echo "<p>".$row['city'].", ".$row['postal_code']."</p>";
            echo $row['reservation_text'] ? "<p>Réservé: ".$row['reservation_text']."</p>" : "";

            if (!$row['reservation_text']) {
                echo "<form action='handle_reservation.php?id=".$row['id_produit']."' method='POST'>";
                echo "<textarea name='reservation_text' placeholder='Réservez ce produit'></textarea>";
                echo "<input type='submit' value='Je réserve'>";
                echo "</form>";
            }

            echo "</div>";
            ?>
        </div>
    </section>
</body>
</html>
