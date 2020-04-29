<div class="container">
    <h1>Voici la liste des animaux que nous possédons</h1>
    <div class="row">   
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
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
