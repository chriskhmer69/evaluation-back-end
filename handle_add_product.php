<?php
require_once 'config.php';

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];

if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $upload_folder = 'uploads/';
    $destination = $upload_folder . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
        $image = $_FILES['image']['name'];
    } else {
        echo 'Il y avait un problème lors du téléchargement de l\'image.';
        exit;
    }
} else {
    echo 'Une image est requise.';
    exit;
}

$sql = "INSERT INTO produit (title, description, price, city, postal_code, image) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$title, $description, $price, $city, $postal_code, $image])) {
    header('Location: index.php');
} else {
    echo 'Une erreur est survenue lors de l\'ajout du produit.';
}
?>

