<div class="container">
    <h1 class="text-center">Voici les details du produit que vous avez selectionné</h1>
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
                    <?php if($this->isAdmin()) { ?>
                        <a href="<?= $this->goto('editProduct', $product->getId()); ?>"><button class="btn btn-warning mx-3">Modifier</button></a>
                        <a href="<?= $this->goto('deleteProduct', $product->getId()); ?>"><button class="btn btn-danger mx-3">Supprimer</button></a>
                    <?php } elseif($this->isConnected()) { ?> 
                        <a href="<?= $this->goto('addToCart', $_GET['id']) ?>"><button class="btn btn-success">Ajouter au panier</button></a><br>
                    <?php } else { ?>
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">Connectez-vous pour ajouter au panier !</h4>
                            <p>Vous souhaitez nous aider tout en rendant heureux votre animal de compagnie ?</p>
                            <hr>
                            <a href="<?= $this->goto('login') ?>" class="btn btn-outline-primary">Connectez-vous !</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
