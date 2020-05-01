<div class="container">
    <?php if($animal) { ?> 
        <h1 class="text-center my-5">Détails de <?= $animal->getName() ?></h1>
        <div class="w-50 mx-auto">
            <img class="d-block w-100" src="<?= $this->asset('upload/imgAnimal/' . $animal->getImage()) ?>" alt="<?= $animal->getName() ?>">
        </div>
        <div class="card-body">
            <div class="row w-50 mx-auto">
                <div class="col-md-3">
                    <p><strong>Type: </strong><?= $animal->getType() ?></p>
                </div>
                <div class="col-md-3">
                    <p><strong>Race: </strong><?= $animal->getRace() ?></p>
                </div>
                <div class="col-md-2">
                    <p><strong>Taille: </strong><?= $animal->getSize() ?></p>
                </div>
                <div class="col-md-2">
                    <p><strong>Poids: </strong><?= $animal->getWeight() ?></p>
                </div>
                <div class="col-md-2">
                    <p><strong>Age: </strong><?= $animal->getAge() ?></p>
                </div>
            </div>
        </div>
        <div class="text-center mb-5">
            <a href="<?= $this->goto('editAnimal', $animal->getId()); ?>"><button class="btn btn-warning mr-3">Modifier</button></a>
            <a href="<?= $this->goto('removeAnimal', $animal->getId()); ?>"><button class="btn btn-danger ml-3">Supprimer</button></a>
        </div>
    <?php } ?>
</div>
