<div class="container">
    <h1 class="text-center my-5">Modifier le produit <?= strtolower($product->getName()) ?></h1>
    <div class="row">
        <form action="<?= $this->goto('newProduct') ?>" method="POST" enctype="multipart/form-data" class="mx-auto">
            <div class="form-group">
                <label for="NameInput">Nom du produit</label>
                <input type="text" class="form-control" id="NameInput" name="name" value="<?= $product->getName() ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>
                <div class="form-group col-md-6">
                    <label for="TypeSelect">Conseillé pour :</label>
                    <select class="form-control" id="TypeSelect" name="type_animal"><?php $type_animal = $product->getTypeAnimal() ?>
                        <option value="chien" <?php if ($type_animal === "chien") { ?> selected <?php } ?>>Chien</option>
                        <option value="chat" <?php if ($type_animal === "chat") { ?> selected <?php } ?>>Chat</option>
                        <option value="cochon" <?php if ($type_animal === "cochon") { ?> selected <?php } ?>>Cochon</option>
                        <option value="poulet" <?php if ($type_animal === "poulet") { ?> selected <?php } ?>>Poulet</option>
                        <option value="ecureuil" <?php if ($type_animal === "ecureuil") { ?> selected <?php } ?>>Ecureuil</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="StockProduct">Stock</label><br>
                    <input type="number" class="form-control" id="StockProduct" name="stock" value="<?= $product->getStock() ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="PriceProduct">Prix du produit</label><br>
                    <input type="number" class="form-control" id="PriceProduct" name="price" value="<?= $product->getPrice() ?>">
                </div>
            </div>
            <div class="text-center my-4">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>