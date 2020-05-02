<div class="container">
    <?php if($animal) { ?> 
        <h1 class="text-center my-5">Détails de <?= $animal->getName() ?></h1>
        <div class="w-50 mx-auto text-center">
            <img class="h-100 w-100" src="<?= $this->asset('upload/imgAnimal/' . $animal->getImage()) ?>" alt="<?= $animal->getName() ?>">
        </div>
        <div class="card-body">
            <div class="row w-50 mx-auto">
                <div class="col-md-6">
                    <p><strong>Espèce: </strong> <?= ucfirst($animal->getType()) ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Race: </strong><?= $animal->getRace() ?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Taille: </strong><?= $animal->getSize() ?> Cm</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Poids: </strong><?= $animal->getWeight() ?> Kg</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Age: </strong><?= $animal->getAge() ?> mois</p>
                </div>
            </div>
        </div>
        <div class="text-center mb-5">
            <a href="<?= $this->goto('editAnimal', $animal->getId()); ?>"><button class="btn btn-warning mx-3">Modifier</button></a>
            <a href="<?= $this->goto('removeAnimal', $animal->getId()); ?>"><button class="btn btn-danger mx-3">Supprimer</button></a>
            <a href="<?= $this->goto('bookAnimal', $animal->getId()); ?>"><button class="btn btn-primary mx-3">Reservez cet animal !</button></a>
        </div>
    <?php } ?>
</div>
