<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="/scripts.js"></script>
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
            <form action="/handle_add_product.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Titre" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="number" name="price" placeholder="Prix" required>
                <input type="text" name="city" placeholder="Ville" required>
                <input type="text" name="postal_code" placeholder="Code Postal" required>
                <input type="file" name="image" required>
                <input type="submit" value="Ajouter un produit">
            </form>
        </div>
    </section>
</body>
</html>
