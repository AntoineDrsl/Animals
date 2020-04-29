<div class="container">
    <h1>Voici la liste des animaux que nous possédons</h1>
    <a href="<?= $this->goto('newAnimal') ?>"><button class="btn btn-primary">Ajouter un animal</button></a>
        <div class="row">   
        <?php if($animals) { ?> 
            <?php foreach($animals as $animal) { ?>
                <div class="col-md-4">  
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?= $animal->getName() ?></h5>
                        </div>
                        <div class="card-body">
                            <a href="<?= $this->goto('singleAnimal', $animal->getId()) ?>"><button class="btn btn-primary">Voir plus</button></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
