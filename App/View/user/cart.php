
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">
        <?php if($productInCart){?>
        <h1>Liste des produits dans mon panier</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Image du produit</th>
                    <th scope="col">A utiliser sur</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productInCart as $key => $value){?>
                        <tr>
                            <td><img src="<?= $this->asset('upload/imgProduct/' . $value->getImage()) ?>" alt="<?= $value->getName() ?>" width="10%"></td>
                            <td><?= $value->getTypeAnimal()?></td>
                            <td><?= $value->getStock() ?></td>
                            <td><?= $value->getPrice() ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <a href="<?= $this->goto('paiement') ?>"><button class="btn btn-success">Passer la commande</button></a><br>
        <?php } else{?>

            <h1 class="text-center">Rien dans votre panier</h1>
            <div class="btn mx-auto w-100">
                <a href="<?= $this->goto('products') ?>"><button class="btn btn-success">Voir la liste des produits</button></a><br>
            </div>

        <?php }?>
    </div>


</div>
