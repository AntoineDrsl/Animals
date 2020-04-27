<div class="container">
    <h1>Bienvenue sur le site de Animals</h1>
    <div class="row">   
        <?php if($animals) { ?> 
            <?php foreach($animals as $animal) { ?>
                <div class="col-md-4">  
                    <div class="card">
                        <h5 class="card-title"><?= $animal->getName() ?></h5>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
