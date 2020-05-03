
<div class="container-fluid">
    <?php if($successMessage) { ?>
        <div class="alert alert-success" role="alert">
            <p><?= $successMessage ?></p>
        </div>
    <?php } ?>

    <div class="row">

        <div class="col-lg-12">
        <?php if($productInCart){?>
        <h1 class="my-5">Liste des produits dans mon panier</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Image du produit</th>
                    <th scope="col">A utiliser sur</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productInCart as $product){?>
                        <tr>
                            <td><img src="<?= $this->asset('upload/imgProduct/' . $product['product']->getImage()) ?>" alt="<?= $product['product']->getName() ?>" width="10%"></td>
                            <td><?= $product['product']->getTypeAnimal()?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= $product['product']->getPrice() ?> €</td>
                            <td><?= $product['product']->getPrice() * $product['quantity'] ?> €</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <div class="h4 bold">Total: <?= $totalAmount ?></div>
            <form method="POST" action="<?=$this->goto('cart') ?>">
                <input type="submit" class="btn btn-success" value="Passer la commande" name="submit">
            </form>
        <?php } else{?>

            <h1 class="text-center my-5">Rien dans votre panier</h1>
            <div class="btn mx-auto w-100">
                <a href="<?= $this->goto('products') ?>"><button class="btn btn-success">Voir la liste des produits</button></a><br>
            </div>

        <?php }?>
    </div>


</div>
