<div class="container">
    <h1 class="text-center my-5">Entrer un nouveau produit</h1>
    <div class="row">
        <form action="<?= $this->goto('newProduct') ?>" method="POST" enctype="multipart/form-data" class="mx-auto">
            <div class="form-group">
                <label for="NameInput">Nom du produit</label>
                <input type="text" class="form-control" id="NameInput" name="name">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="TypeSelect">Conseillé pour :</label>
                    <select class="form-control" id="TypeSelect" name="type_animal">
                        <option value="Chien">Chien</option>
                        <option value="Chat">Chat</option>
                        <option value="Cochon">Cochon</option>
                        <option value="Poulet">Poulet</option>
                        <option value="Ecureuil">Ecureuil ?</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="StockProduct">Stock</label><br>
                    <input type="number" class="form-control" id="StockProduct" name="stock">
                </div>
                <div class="form-group col-md-6">
                    <label for="PriceProduct">Prix du produit</label><br>
                    <input type="number" class="form-control" id="PriceProduct" name="price">
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