<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * PaymentModel
 *
 * Interacts with the `payments` table.
 */
class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['invoice_id', 'amount', 'payment_method', 'created_at'];
}
