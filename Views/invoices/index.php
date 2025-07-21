<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<h2>Invoices</h2>
<a href="<?= base_url('invoices/create') ?>" class="btn btn-primary">Create New Invoice</a>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Client Name</th>
            <th>Due Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= $invoice['id'] ?></td>
                <td><?= htmlspecialchars($invoice['client_name']) ?></td>
                <td><?= $invoice['due_date'] ?></td>
                <td><?= $invoice['amount'] ?></td>
                <td><?= $invoice['status'] ?></td>
                <td>
                    <form method="post" action="<?= base_url("invoices/updateStatus/{$invoice['id']}") ?>" class="d-inline">
                        <?= csrf_field() ?>
                        <select name="status" onchange="this.form.submit()">
                            <option <?= $invoice['status'] == 'pending' ? 'selected' : '' ?>>pending</option>
                            <option <?= $invoice['status'] == 'paid' ? 'selected' : '' ?>>paid</option>
                            <option <?= $invoice['status'] == 'overdue' ? 'selected' : '' ?>>overdue</option>
                        </select>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
