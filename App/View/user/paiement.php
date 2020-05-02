<form action="<?= $this->goto('paiement') ?>" method="POST">
    <input type="text" value="<?= $montant ?>" name="total_amount" readonly>
    <button type="submit" class="btn btn-success">Commander</button>
</form>