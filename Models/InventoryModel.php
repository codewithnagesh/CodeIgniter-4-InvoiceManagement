<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * InventoryModel
 *
 * Interacts with the `inventory` table.
 */
class InventoryModel extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'quantity'];
}
