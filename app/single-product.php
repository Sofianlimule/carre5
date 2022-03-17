<?php
    require '_head.php';
    require '_sqlfetchSingle.php';

    
?>

<?php if(!empty($product)) :?>
        <div class="card m-4">
        <div class="card-body">
            <h3 class="card-title"><?php echo $product['name'];?></h3>
            <p>Prix : <?php echo $product['price'];?>€</p>
            <hr>
            <p>Description : <?php echo $product['description'];?></p>
            <div class="d-flex justify-content-around">
                <a href="" class="btn btn-outline-success col-5">Détails</a>
            </div>
        </div>
    </div>
<?php else : ?>
    header('Location:product.php?error=notFound');
<?php endif; ?>



<?php require '_footer.php'; ?>