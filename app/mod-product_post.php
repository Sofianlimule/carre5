<?php

declare(strict_types=1);
require 'include/config.php';

if (in_array('', $_POST)) { //verif si tout les champs sont vides
    header("Location: mod-product.php?id={$_POST['product_id']}&error=missingInput"); //si les champs sont vides message erreur

} else {
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price = htmlspecialchars(trim($_POST['price']));
    $product_id = htmlspecialchars(trim($_POST['product_id']));
    $dlc = htmlspecialchars(trim($_POST['dlc']));
}
//assenir les var  / evite pour les injections

if ($price <= 0) {
    header("Location:mod-product.php?id={$_POST['product_id']}&error=invalidPrice");
    exit();
} //verif si le prix est inferieur a 0 si c'est le cas sa m'envoie mss erreur

if (strlen($name) < 3) {
    header("Location:mod-product.php?id={$_POST['product_id']}&error=invalidName");
    exit(); //verif si le nom du produit a 3 carac si c le cas mess erreur 
}

try {
    $sqlUpdateOffer = 'UPDATE product SET name=:name, description=:description, price=:price, dlc=:dlc WHERE product_id=:product_id';// requete sql pour modif les donnée de la bdd
    $reqUpdateOffer = $db->prepare($sqlUpdateOffer); //prep la requete
    $reqUpdateOffer->execute([ //execute la req
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'product_id' => $product_id,
        'dlc' => $dlc,
    ]);

    header("Location:single-product?success=editSuccess&id={$product_id}"); //mess succes pour dire que sa ete fait 
} catch (PDOException $e) { // si il y a 1 probleme dans la requete sql sa envoie mess err
    echo 'Erreur : '.$e->getMessage(); //mess err
    echo "<meta http-equiv='refresh' content='3;URL=editOffer.php?id={$product_id}'>"; //indique mess erreur temps defini 
}