<h2>Process Payment</h2>

<form method="post" action="<?= base_url('payments/store') ?>">
    <?= csrf_field() ?>
    <input type="hidden" name="invoice_id" value="<?= $invoiceId ?>">
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="payment_method">Payment Method</label>
        <select name="payment_method" id="payment_method" class="form-control">
            <option value="credit_card">Credit Card</option>
            <option value="bank_transfer">Bank Transfer</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
</form>
