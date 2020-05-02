<div class="container text-center">
    <h1 class="my-5 text-center">Voici la liste des produits que nous possedons</h1>
    <a href="<?= $this->goto('newProduct') ?>"><button class="btn btn-primary">Ajouter un produit</button></a>
    <div class="row mt-5">
        <?php if($products) { ?> 
            <?php foreach($products as $product) { ?>
                <div class="col-md-4">  
                    <div class="card  text-center">
                        <div class="card-header">
                            <h5 class="card-title"><?= $product->getName() ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <?= ' Pour les ' . strtolower($product->getTypeAnimal()) . 's.'?><br>
                        <?= $product->getStock() . ' en stock' ?><br>
                        <?=  $product->getPrice() . ' €'?>
                            </p>
                        </div>
                        <a href="<?= $this->goto('singleProduct', $product->getId()); ?>"><button class="btn btn-primary px-5">Details</button></a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
