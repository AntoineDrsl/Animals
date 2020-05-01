<?php if (count($_POST)>0) echo "<div class='border-bottom border-success text-center'><p>La donation a bien été reçue !</p></div>"; ?>
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
        <?php if ($animals) { ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 75vh; overflow: hidden">
                <ol class="carousel-indicators">
                    <?php foreach ($animals as $key => $animal) { ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php $key ?>" <?php if($key === 0) { ?> class="active" <?php } ?>></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($animals as $key => $animal) { ?>
                        <div class="carousel-item <?php if($key === 0) { ?> active <?php } ?>">
                        <a href="<?= $this->goto('singleAnimal', $animal->getId()) ?>">
                            <img class="d-block w-100 h-100" src="<?= $this->asset('upload/imgAnimal/' . $animal->getImage()) ?>" alt="slide">
                            </a>
                            <div class="carousel-caption d-none d-md-block" style="position: absolute; top: 25px; height: 100px; background-color: rgba(25, 25, 25, 0.5)">
                                <h5><?= $animal->getName() ?></h5>
                                <p>Type: <?= $animal->getType() ?> - Race: <?= $animal->getRace() ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<div id="homeProducts">
    <div class="container">
        <h2 class="my-5 text-center">Les derniers articles</h2>
        <div class="row">
            <?php if ($products) { ?>
                <?php foreach ($products as $product) { ?>
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
<div id="homeDonation">
    <div class="container">

        <?php //if (!isset($_SESSION["user"])): 
        ?>

        <h2 class="my-5 text-center">Se connecter pour faire une donation</h2>
        <span class="navbar-text">
            <a href="#" class="btn btn-outline-light mr-4">Se connecter</a>
        </span>
        <?php //else: 
        ?>
        <h2 class="my-5 text-center">Faire une donation</h2>
        <div class="row">
            <div class="col-md-5 text-center mx-auto">
                <form action="index.php?page=home" method="POST">
                    <div class="form-group">
                        <label for="amount">Montant de la donation</label>
                        <input type="number" required class="form-control" id="amount" name="amount" min="1" aria-describedby="amountHelp">
                        <small id="amountHelp" class="form-text text-muted">Le montant de la donation est en euro €.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Faire une donation</button>
                </form>
            </div>
        </div>
        <?php //endif 
        ?>
    </div>
</div>