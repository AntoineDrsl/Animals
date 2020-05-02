<div class="container">
    <h1 class="text-center">Voici les details de l'animal que vous avez selectionné</h1>
        <div class="row">   
        <?php if($product) { ?> 
            <div class="col-lg-12">  
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title"><?= $product->getName() ?></h5>
                    </div>
                    <div class="card-body">
                        <?= ' Conseillé pour les ' . strtolower($product->getTypeAnimal()) . 's.'?><br>
                        <?= ' Nous avons ' . $product->getStock() . ' ' . strtolower($product->getName()) . ' en stock' ?><br>
                        <?= ' Prix unitaire : ' . $product->getPrice() . ' €'?>
                    </div>
                    <a href="<?= $this->goto('deleteProduct', $product->getId()); ?>"><button class="btn btn-danger">Supprimer</button></a><br>
                    <a href="<?= $this->goto('editProduct', $product->getId()); ?>"><button class="btn btn-warning">Modifier</button></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
