<div class="container">
    <h1>Voici la liste des produits que nous possedons</h1>
    <div class="row">
    <a href="<?= $this->goto('newProduct') ?>"><button class="btn btn-primary">Ajouter un produit</button></a>
        <?php if($products) { ?> 
            <?php foreach($products as $product) { ?>
                <div class="col-md-4">  
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?= $product->getName() ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?= $product->getTypeAnimal() . ' ' . $product->getStock()?>
                                <?= $product->getPrice()?>
                            </p>
                        </div>
                        <a href="<?= $this->goto('singleProduct', $product->getId()); ?>"><button class="btn btn-primary">Details</button></a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
