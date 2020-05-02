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
        <?php } else { ?>
            <div class="alert alert-primary" role="alert">
                Pas d'animaux à adopter aujourd'hui, revenez plus tard :)
            </div>
        <?php } ?>
    </div>
</div>
<div id="homeProducts">
    <div class="container overflow-hidden">
        <h2 class="my-5 text-center">Les derniers articles</h2>
        <?php if ($products) { ?>
        <div id="slideContainer">
            <?php foreach ($products as $product) { ?>
                <div class="card h-75 w-25 text-center sliderItem">
                    <img class="card-img-top h-100" src="<?= $this->asset('upload/imgProduct/' . $product->getImage()) ?>" alt="<?= $product->getName() ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->getName() ?></h5>
                        <a href="<?= $this->goto('singleProduct', $animal->getId()) ?>"><button class="btn btn-primary">Voir plus</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php } else { ?>
            <div class="alert alert-primary" role="alert">
                Pas de produits à acheter aujourd'hui, revenez plus tard :)
            </div>
        <?php } ?>
    </div>
</div>
<div id="homeDonation">
    <div class="container">
                    
        <h2 class="my-5 text-center">Faire une donation</h2>
        <?php if (!isset($_SESSION["user"])): ?>
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">Connectez-vous pour faire une donation !</h4>
                <p>Vous avez 5€ ? Vous pouvez les investir dans un kebab, ou bien faire une bonne action en faisant une donation. Créer vous un compte et aider nous à sauvez les animaux.</p>
                <hr>
                <a href="" class="btn btn-outline-primary">Connectez-vous !</a>
            </div>
        <?php else: ?>
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
        <?php endif 
        ?>
    </div>
</div>