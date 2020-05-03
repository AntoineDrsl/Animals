

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <?php if($animals){?>
                <h1>Liste des animaux</h1>
                <table class="table table-dark">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Type</th>
                        <th scope="col">Race</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($animals as $animal){?>
                            <tr>
                                <th scope="row"><?= $animal->getId() ?></th>
                                <td><?= $animal->getName() ?></td>
                                <td><?= $animal->getType() ?></td>
                                <td><?= $animal->getRace() ?></td>
                                <td>
                                    <a href="<?= $this->goto('singleAnimal', $animal->getId()) ?>"><button class="btn btn-primary">Voir plus</button></a>
                                    <a href="<?= $this->goto('editAnimal', $animal->getId()); ?>"><button class="btn btn-warning mx-3">Modifier</button></a>
                                    <a href="<?= $this->goto('deleteAnimal', $animal->getId()); ?>"><button class="btn btn-danger mx-3">Supprimer</button></a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            <?php } ?>
            <a href="<?= $this->goto('newAnimal') ?>"><button class="btn btn-primary mb-5">Ajouter un animal</button></a>
        </div>

        <div class="col-lg-6 col-md-12">
            <h1>Liste des produits</h1>
            <?php if($products){?>
                <table class="table table-dark">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Pour</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product){?>
                            <tr>
                                <th scope="row"><?= $product->getId() ?></th>
                                <td><?= $product->getName() ?></td>
                                <td><?= $product->getTypeAnimal() ?></td>
                                <td><?= $product->getPrice() ?></td>
                                <td><?= $product->getStock() ?></td>
                                <td>
                                    <a href="<?= $this->goto('singleProduct', $product->getId()) ?>"><button class="btn btn-primary">Voir plus</button></a>
                                    <a href="<?= $this->goto('editProduct', $product->getId()); ?>"><button class="btn btn-warning mx-3">Modifier</button></a>
                                    <a href="<?= $this->goto('deleteProduct', $product->getId()); ?>"><button class="btn btn-danger mx-3">Supprimer</button></a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            <?php } ?>
            <a href="<?= $this->goto('newProduct') ?>"><button class="btn btn-primary mb-5">Ajouter un produit</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1>Liste des rendez-vous</h1>
            <?php if($reservationAnimal && $reservationUser){?>
                <table class="table table-dark">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Nom du client</th>
                        <th scope="col">Nom de l'animal</th>
                        <th scope="col">Date du rendez-vous</th>
                        <th scope="col">Date de l'enregistrement</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $reservationUser->firstname . " " . $reservationUser->lastname?></td>
                            <td><?= $reservationAnimal->name ?></td>
                            <td><?= $reservationAnimal->getRendezVous() ?></td>
                            <td><?= $reservationAnimal->getDatetime() ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1>Liste des commandes</h1>
            <?php if($commands){?>
                <table class="table table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom du client</th>
                            <th scope="col">Produits & quantité</th>
                            <th scope="col">Montant total</th>
                            <th scope="col">Date de la commande</th>
                            <th scope="col">Etat</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($commands as $command) { ?>
                            <tr>
                                <td><?= $command['user']->getFirstname() . " " . $command['user']->getLastname()?></td>
                                <td>
                                    <?php foreach($command['products'] as $product) { ?>
                                        <?= $product['product']->getName() ?> : <?= $product['quantity'] ?> (<?= $product['product']->getPrice() * $product['quantity'] ?>€)<br>
                                    <?php } ?>
                                </td>
                                <td><?= $command['command']->getTotalAmount() ?> €</td>
                                <td><?= $command['command']->getDatetime() ?></td>
                                <td>
                                    <?php if($command['command']->getState() == 2) { ?>
                                        En attente de validation
                                    <?php } elseif($command['command']->getState() == 1) { ?>
                                        Erreur de paiement
                                    <?php } elseif($command['command']->getState() == 3) { ?>  
                                        En cours de livraison
                                    <?php } elseif($command['command']->getState() == 4) { ?>
                                        Livré
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="<?= $this->goto('changeState', $command['command']->getId()) ?>" method="POST">
                                        <select name="state" id="state">
                                            <option value="1" <?php if($command['command']->getState() == 1) { ?> selected <?php } ?>>Erreur de paiement</option>
                                            <option value="2"  <?php if($command['command']->getState() == 2) { ?> selected <?php } ?>>En attente de livraison</option>
                                            <option value="3" <?php if($command['command']->getState() == 3) { ?> selected <?php } ?>>En cours de livraison</option>
                                            <option value="4" <?php if($command['command']->getState() == 4) { ?> selected <?php } ?>>Livré</option>
                                        </select>
                                        <input type="submit" class="btn btn-outline-light">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php }?>
            <a href="<?= $this->goto('newProduct') ?>"><button class="btn btn-primary mb-5">Ajouter un produit</button></a>
        </div>
    </div>

    
</div>




