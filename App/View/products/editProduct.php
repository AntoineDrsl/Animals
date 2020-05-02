<div class="container">
    <div class="row">      
        <form action="<?= $this->goto('editProduct', $product->getId()) ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="NameInput">Nom du produit</label>
                <input type="text" class="form-control" id="NameInput" name="name">
            </div>
            <div class="form-group col-md-4">
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="TypeSelect">Pour quel animal</label>
                <select class="form-control" id="TypeSelect" name="type_animal">
                    <option value="Chien">Chien</option>
                    <option value="Chat">Chat</option>
                    <option value="Cochon">Cochon</option>
                    <option value="Poulet">Poulet</option>
                    <option value="Ecureuil">Ecureuil ?</option>
                </select>
            </div>
            <div class="form-row">
        
                <div class="form-group col-md-4">
                    <label for="StockProduct">Stock</label><br>   
                    <input type="number" class="form-control" id="StockProduct" name="stock">
                </div>
                <div class="form-group col-md-4">
                    <label for="PriceProduct">Prix de l'animal</label><br>
                    <input type="number" class="form-control" id="PriceProduct" name="price">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
