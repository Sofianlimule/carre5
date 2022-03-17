<?php
// fichier qui sert à mettre les produits dans un array. Utile pour l'index.php
    $sqlOffers = 'SELECT * FROM product';
    $reqOffers = $db->prepare($sqlOffers);
    $reqOffers->execute();

    $products = $reqOffers->fetchAll();