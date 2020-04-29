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
        <div class="row">
            <?php if ($animals) { ?>
                <?php foreach ($animals as $animal) { ?>
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