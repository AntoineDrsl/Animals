

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
                        <?php }?>
                    </tbody>
                </table>
            <a href="<?= $this->goto('newProduct') ?>"><button class="btn btn-primary mb-5">Ajouter un produit</button></a>
        </div>

    </div>

    
</div>




