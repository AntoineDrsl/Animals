<div class="container text-center">
    <h1 class="my-5 text-center">Animaux à adopter</h1>
    <?php if($this->isAdmin()) { ?>
        <a href="<?= $this->goto('newAnimal') ?>"><button class="btn btn-primary">Ajouter un animal</button></a>
    <?php } ?>
    <div class="row mt-5">
        <?php if ($animals) { ?>
            <?php foreach ($animals as $animal) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-75 text-center">
                        <img class="card-img-top h-100" src="<?= $this->asset('upload/imgAnimal/' . $animal->getImage()) ?>" alt="<?= $animal->getName() ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $animal->getName() ?></h5>
                            <a href="<?= $this->goto('singleAnimal', $animal->getId()) ?>"><button class="btn btn-primary">Voir plus</button></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>