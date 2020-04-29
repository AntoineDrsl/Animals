<div id="homePresentation">
    <div id="homeContent1" class="container">  
        <h1 class="text-white text-center my-5">Bienvenue sur le site de Animals</h1>
        <div id="homeText1">
            <div>
                <h3>Protégeons</h3>
                <p>Animals lutte contre les abandons d'animaux de compagnie en menant régulièrement des actions de sensibilisation.</p>
            </div>
            <div>
                <h3>Aidons</h3>
                <p>Nous aidons les animaux retrouvés en leur apportant eau, nourriture et premiers soins</p>
            </div>
            <div>
                <h3>Adoptons</h3>
                <p>Nous vous proposons d'adopter un animal abandonné. Donnons-leurs une deuxième chance !</p>
            </div>
        </div>
        <div id="animals">
            <img src="<?= $this->asset('images/animaux.png') ?>" alt="animaux">
        </div>
    </div>
</div>
<div id="homeAnimals">
    <div class="container">
        <h2 class="my-5 text-center">Les derniers animaux à adopter</h2>
        <div class="row">   
            <?php if($animals) { ?> 
                <?php foreach($animals as $animal) { ?>
                    <div class="col-md-4">  
                        <div class="card">
                            <img class="card-img-top" src="https://fakeimg.pl/250x100/" alt="<?= $animal->getName() ?>">
                            <h5 class="card-title"><?= $animal->getName() ?></h5>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<div id="homeProducts">
    <div class="container">
        <h2 class="my-5 text-center">Les derniers articles</h2>
        <div class="row">   
            <?php if($products) { ?> 
                <?php foreach($products as $product) { ?>
                    <div class="col-md-4">  
                        <div class="card">
                            <img class="card-img-top" src="https://fakeimg.pl/250x100/" alt="<?= $product->getName() ?>">
                            <h5 class="card-title"><?= $product->getName() ?></h5>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
