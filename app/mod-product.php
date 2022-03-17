<?php
    require_once '_head.php';
    require '_sqlFetchSingle.php';
?>

<main class="main-content ps">
    <div class="card-header text-center pt-4">
        <h5>Modifier un produit</h5>
    </div>
    <div class="card-body m-5">
        <form action="mod-product_post.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nom du produit" aria-label="Name" aria-describedby="Name" name="name" value="<?php echo $singleProduct['name']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="Description" name="description" value="<?php echo $singleProduct['description']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Prix" aria-label="Price" aria-describedby="Price" name="price" value="<?php echo $singleProduct['price']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" placeholder="Date limte de consommation" aria-label="dlc" aria-describedby="dlc" name="dlc" value="<?php echo $singleProduct['dlc']; ?>">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="image" value="">
            </div>
            <input type="hidden" name="offers_id" value="<?php echo $singleProduct['product_id']; ?>">
            <button type="submit" class="btn mt-3">Modifier</button>
        </form>
    </div>
</main>
<?php
include_once '_footer.php';
?>