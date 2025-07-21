<h2>Create New Invoice</h2>

<form method="post" action="<?= base_url('invoices/store') ?>">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="client_name">Client Name</label>
        <input type="text" name="client_name" id="client_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success mt-3">Create Invoice</button>
</form>
