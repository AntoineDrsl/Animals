<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $this->asset('css/style.css') ?>">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-light">
            <a class="navbar-brand" href="<?= $this->goto('home') ?>">Animals</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= $this->onPage('home', $onPage) ?>">
                        <a class="nav-link" href="<?= $this->goto('home') ?>">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= $this->onPage('animals', $onPage) ?>">
                        <a class="nav-link" href="<?= $this->goto('animals') ?>">Animaux</a>
                    </li>
                    <li class="nav-item <?= $this->onPage('products', $onPage) ?>">
                        <a class="nav-link" href="<?= $this->goto('products') ?>">Produits</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php if(!isset($_SESSION['user'])) { ?>
                        <a href="<?= $this->goto('login') ?>" class="btn btn-outline-light mr-4">Se connecter</a>
                        <a href="<?= $this->goto('signup') ?>" class="btn btn-outline-light mr-4">S'inscrire</a>
                    <?php } else { ?>
                        <?php if($this->isAdmin()) { ?>
                            <a href="<?= $this->goto('admin') ?>" class="btn btn-outline-light mr-4">Admin</a>
                        <?php } ?>
                        <a href="<?= $this->goto('cart') ?>" class="btn btn-outline-light mr-4">Panier</a>
                        <a href="<?= $this->goto('logout') ?>" class="btn btn-outline-light mr-4">Se déconnecter</a>
                    <?php } ?>
                </span>
            </div>
        </nav>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <!-- FOOTER -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>