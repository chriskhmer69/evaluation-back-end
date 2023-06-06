<?php
require_once 'config.php';

$id = $_GET['id'];
$reservation_text = $_POST['reservation_text'];

$sql = "UPDATE produit SET reservation_text = ? WHERE id_produit = ?";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$reservation_text, $id])) {
    header('Location: view_product.php?id='.$id);
} else {
    echo 'Une erreur est survenue lors de la réservation du produit.';
}
?>
