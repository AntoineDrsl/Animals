<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="card-title">Réserver <?= $animal->getName() ?></h1>
                </div>
                <div class="card-body">
                    <img src="https://jardinage.lemonde.fr/images/dossiers/2017-06/labrador-1-101957.jpg" alt="<?= $animal->getName() ?>" class="card-img">

                    <form action="<?= $this->goto('bookAnimal', $animal->getId()) ?>" method="POST">
                        <input type="text" value="<?= $animal->getId() ?>" style="display: none;" name="animal_id">

                        <div class="form-group">
                            <label for="rendezvous">Prise de rendez-vous</label><br>
                            <input type="date" name="rendezvous" id="rendezvous">
                        </div>

                        <button class="btn btn-success" type="submit">Reserver !</button>
                    </form>
                </div>
            </div>


            


        </div>
    </div>
    
</div>