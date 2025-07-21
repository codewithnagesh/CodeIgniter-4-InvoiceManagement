<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * InvoiceItemModel
 *
 * Interacts with the `invoice_items` table.
 */
class InvoiceItemModel extends Model
{
    protected $table = 'invoice_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['invoice_id', 'item_name', 'quantity', 'price'];
}
