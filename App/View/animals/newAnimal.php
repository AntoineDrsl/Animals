
<div class="container">
    <h1 class="text-center my-5">Entrer un nouvel animal</h1>
    <div class="row">      
        <form action="<?= $this->goto('newAnimal') ?>" method="POST" enctype="multipart/form-data" class="mx-auto">
            <div class="form-group">
                <label for="NameInput">Nom</label>
                <input type="text" class="form-control" id="NameInput" name="name">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="TypeSelect">Type de l'animal</label>
                    <select class="form-control" id="TypeSelect" name="type">
                        <option value="chien">Chien</option>
                        <option value="chat">Chat</option>
                        <option value="cochon">Cochon</option>
                        <option value="poulet">Poulet</option>
                        <option value="ecureuil">Ecureuil</option>
                    </select>
                </div>
            <div class="form-group col-md-6">
                <label for="RaceName">Race de l'animal</label><br>
                <input type="text" class="form-control" id="RaceName"  name="race">
            </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-4">
                    <label for="SizeAnimal">Taille de l'animal</label><br>   
                    <input type="number" class="form-control" id="SizeAnimal"  name="size">
                </div>
                <div class="form-group col-md-4">
                    <label for="WeightAnimal">Poids de l'animal</label><br>
                    <input type="number" class="form-control" id="WeightAnimal"  name="weight">
                </div>
                <div class="form-group col-md-4">
                    <label for="AgeAnimal">Age de l'animal</label><br>
                    <input type="number" class="form-control" id="AgeAnimal"  name="age">
                </div> 
            </div>
            <div class="form-group">
                <input type="file" name="image" id="image" class="form-control-file my-3">
            </div>
            <div class="text-center my-4">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
            <?= $error ?>
        </form>
    </div>
</div>
