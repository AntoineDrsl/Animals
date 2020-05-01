<div class="container">
    <h1 class="text-center">Voici les details de l'animal que vous avez selectionné</h1>
        <div class="row">   
        <?php if($animal) { ?> 
            <div class="col-lg-12">  
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title"><?= $animal->getName() ?></h5>
                    </div>
                    <div class="card-body">
                        <?= ' Type: ' . $animal->getType() . ' Race: ' . $animal->getRace()?><br>
                        <?= ' Taille de l\'animal: ' . $animal->getSize() . ' Poids: ' . $animal->getWeight() . ' Age: ' . $animal->getAge() ?>
                    </div>
                    <a href="<?= $this->goto('removeAnimal', $animal->getId()); ?>"><button class="btn btn-danger">Supprimer</button></a>
                    <a href="<?= $this->goto('editAnimal', $animal->getId()); ?>"><button class="btn btn-warning">Modifier</button></a>
                    <a href="<?= $this->goto('bookAnimal', $animal->getId()); ?>"><button class="btn btn-warning">Reserver cette animal !</button></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
