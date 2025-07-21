<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * InvoiceModel
 *
 * Interacts with the `invoices` table.
 */
class InvoiceModel extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $allowedFields = ['client_name', 'due_date', 'amount', 'status', 'created_at', 'updated_at'];
}
