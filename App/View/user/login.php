<div class="container mt-5">

    <h1 class="text-center">Je me connecte</h1>   

    <form action="<?= $this->goto('login') ?>" method="POST">
        <p class="text-danger"><?= $errorMessage ?></p>
        <div class="form-group">
            <label for="email">Adresse email</label>
            <input type="text" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Se connecter">
    </form>
</div>