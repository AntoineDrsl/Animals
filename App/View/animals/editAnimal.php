<div class="container">
    <h1 class="text-center my-5">Modifier: <?= $animal->getName() ?></h1>
    <div class="row">      
        <form action="<?= $this->goto('newAnimal', $animal->getId()) ?>" method="POST" enctype="multipart/form-data" class="mx-auto">
            <div class="form-group">
                <label for="NameInput">Nom</label>
                <input type="text" class="form-control" id="NameInput" name="name" value="<?= $animal->getName() ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="TypeSelect">Type de l'animal</label>
                    <select class="form-control" id="TypeSelect" name="type">
                        <?php $type = $animal->getType() ?>
                        <option value="chien" <?php if($type === "chien" ) { ?> selected <?php } ?>>Chien</option>
                        <option value="chat" <?php if($type === "chat" ) { ?> selected <?php } ?>>Chat</option>
                        <option value="cochon" <?php if($type === "cochon" ) { ?> selected <?php } ?>>Cochon</option>
                        <option value="poulet" <?php if($type === "poulet" ) { ?> selected <?php } ?>>Poulet</option>
                        <option value="ecureuil" <?php if($type === "ecureuil" ) { ?> selected <?php } ?>>Ecureuil</option>
                    </select>
                </div>
            <div class="form-group col-md-6">
                <label for="RaceName">Race de l'animal</label><br>
                <input type="text" class="form-control" id="RaceName" name="race" value="<?= $animal->getRace() ?>">
            </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-4">
                    <label for="SizeAnimal">Taille de l'animal</label><br>   
                    <input type="number" class="form-control" id="SizeAnimal" name="size" value="<?= $animal->getSize() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="WeightAnimal">Poids de l'animal</label><br>
                    <input type="number" class="form-control" id="WeightAnimal" name="weight" value="<?= $animal->getWeight() ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="AgeAnimal">Age de l'animal</label><br>
                    <input type="number" class="form-control" id="AgeAnimal" name="age" value="<?= $animal->getAge() ?>">
                </div> 
            </div>
            <div class="form-group">
                <input type="file" name="image" id="image" class="form-control-file my-3">
            </div>
            <div class="text-center my-4">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
</div>

