<div class="container">
    <div class="row">      
        <form action="index.php?page=editAnimal&id=<?= $animal->getId(); ?>" method="POST">
            <div class="form-group col-md-4">
                <label for="NameInput">Nom</label>
                <input type="text" class="form-control" id="NameInput" name="name" value="<?= $animal->getName() ?>">
                <small id="nameHelp" class="form-text text-muted">Nom de l'animal que vous voulez enregistrer</small>
            </div>
            <div class="form-group col-md-4">
                <label for="TypeSelect">Type de l'animal</label>
                <select class="form-control" id="TypeSelect" name="type" value="<?= $animal->getType() ?>"> 
                    <option value="Chien">Chien</option>
                    <option value="Chat">Chat</option>
                    <option value="Cochon">Cochon</option>
                    <option value="Poulet">Poulet</option>
                    <option value="Ecureuil">Ecureuil ?</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="RaceName">Race de l'animal</label><br>
                <input type="text" class="form-control" id="RaceName"  name="race" value="<?= $animal->getRace() ?>">
            </div>
            <div class="form-row">
        
                <div class="form-group col-md-4">
                    <label for="SizeAnimal">Taille de l'animal</label><br>   
                    <input type="number" class="form-control" id="SizeAnimal"  name="size" value="<?= $animal->getSize() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="WeightAnimal">Poids de l'animal</label><br>
                    <input type="number" class="form-control" id="WeightAnimal"  name="weight" value="<?= $animal->getWeight() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="AgeAnimal">Age de l'animal</label><br>
                    <input type="number" class="form-control" id="AgeAnimal"  name="age" value="<?= $animal->getAge() ?>">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
</div>
