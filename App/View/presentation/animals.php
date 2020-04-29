<div class="container">
    <h1>Voici la liste des animaux que nous possédons</h1>
    <div class="row">   
        <?php if($animals) { ?> 
            <?php foreach($animals as $animal) { ?>
                <div class="col-md-4">  
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?= $animal->getName() ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?= $animal->getType() . ' ' . $animal->getRace()?>
                            </p>
                            <p class="card-text">
                                <?= $animal->getSize() . ' ' . $animal->getWeight() . ' ' . $animal->getAge()?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
