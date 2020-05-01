<div class="container">
    <h1 class="my-5 text-center">Animaux à adopter</h1>
    <div class="row">   
        <?php if($animals) { ?> 
            <?php foreach($animals as $animal) { ?>
                <div class="col-md-4">  
                    <div class="card h-75">
                        <img src="<?= $this->asset('upload/imgAnimal/' . $animal->getImage()) ?>" alt="<?= $animal->getName() ?>" class="card-img-top h-100">
                        <div class="card-body">     
                            <h5 class="card-title"><?= $animal->getName() ?></h5>
                            <a href="<?= $this->goto('singleAnimal', $animal->getId()) ?>"><button class="btn btn-primary">Voir plus</button></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="text-center">        
        <a href="<?= $this->goto('newAnimal') ?>"><button class="btn btn-primary mt-5">Ajouter un animal</button></a>
    </div>
</div>
