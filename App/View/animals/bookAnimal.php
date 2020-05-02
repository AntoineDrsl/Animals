<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="card-title">Réserver <?= $animal->getName() ?></h1>
                </div>
                <div class="card-body">
                    <form action="<?= $this->goto('bookAnimal', $animal->getId()) ?>" method="POST">
                    
                        <div class="form-group">
                            <label for="rendezvous">Prise de rendez-vous</label>
                            <input type="date" name="rendezvous" id="rendezvous" class="form-control">
                        </div>

                        <button class="btn btn-success" type="submit">Reserver !</button>
                    </form>
                </div>
            </div>


            


        </div>
    </div>
    
</div>