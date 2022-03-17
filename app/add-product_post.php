<?php

declare(strict_types=1);
$auth = true;
require 'include/config.php';

$author = $_SESSION['id'];

// Vérifie si les champs sont vides
if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])) {
    // Si vides : envoie d'une erreur
    header('Location:add-product.php?error=missingInput');
    exit();
} else {
    // Si pas vides : assainissements des données envoyés.
    // htmlspacialchars sert à éviter l'injection de HTML dans les champs input
    // trim sert à gérer les espaces
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $dlc = htmlspecialchars(trim($_POST['dlc']));
    $price = htmlspecialchars(trim($_POST['price']));
}

if ($price <= 0) {
    header('Location:add-product.php?error=invalidPrice');
    exit();
}

if (strlen($name) < 3) {
    header('Location:add-product.php?error=invalidName');
    exit();
}

// Requête SQL pour insérer les données tapées dans les champs dans la base de données.
try {
    $sqlInsertOffer = 'INSERT INTO product (name,description,image,price, dlc) VALUES (:name, :description, :image, :price, :dlc)';
    $reqInsertOffer = $db->prepare($sqlInsertOffer);
    $reqInsertOffer->execute(
        [':name' => $name, ':description' => $description, ':image' => $image, ':price' => $price, ':dlc' => $dlc]
    );

    $insert = $db->lastInsertId();
    header('Location:single-product.php?id='.$insert);
} catch (PDOException $e) {
    echo 'Erreur :'.$e->getMessage().$e->getCode();
}