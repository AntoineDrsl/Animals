
<div class="container">
    <div class="row">      
        <form action="index.php?page=newAnimal" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="NameInput">Nom</label>
                <input type="text" class="form-control" id="NameInput" name="name">
                <small id="nameHelp" class="form-text text-muted">Nom de l'animal que vous voulez enregistrer</small>
            </div>
            <div class="form-group col-md-4">
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="TypeSelect">Type de l'animal</label>
                <select class="form-control" id="TypeSelect" name="type">
                    <option value="Chien">Chien</option>
                    <option value="Chat">Chat</option>
                    <option value="Cochon">Cochon</option>
                    <option value="Poulet">Poulet</option>
                    <option value="Ecureuil">Ecureuil ?</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="RaceName">Race de l'animal</label><br>
                <input type="text" class="form-control" id="RaceName"  name="race">
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
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <?= $error ?>
            </div>
        </form>
    </div>
</div>
