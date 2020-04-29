<div class="container mt-5">
    
    <h1 class="text-center">Nous rejoindre !</h1>

    <form action="<?= $this->goto('signup') ?>" method="POST">
        <p class="text-danger"><?= $errorMessage ?></p>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" class="form-control">
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="city">Ville</label>
                <input type="text" id="city" name="city" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="postalCode">Code postal</label>
                <input type="text" id="postalCode" name="postalCode" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="repeatPassword">Répétez le mot de passe</label>
                <input type="password" id="repeatPassword" name="repeatPassword" class="form-control">
            </div>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="S'inscrire">
        </div>
    </form>
</div>