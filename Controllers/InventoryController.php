<?php

namespace App\Controllers;

use App\Models\InventoryModel;

/**
 * InventoryController
 *
 * Manages inventory including adding, editing, and deleting.
 */
class InventoryController extends BaseController
{
    /**
     * Display all inventory items.
     */
    public function index()
    {
        $inventoryModel = new InventoryModel();
        $data['items'] = $inventoryModel->findAll();

        return view('inventory/index', $data);
    }

    /**
     * Add a new inventory item.
     */
    public function create()
    {
        return view('inventory/create');
    }

    /**
     * Save a new inventory item.
     */
    public function store()
    {
        $inventoryModel = new InventoryModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
        ];
        $inventoryModel->insert($data);

        return redirect()->to('/inventory')->with('success', 'Item added successfully!');
    }

    /**
     * Delete an inventory item.
     */
    public function delete($id)
    {
        $inventoryModel = new InventoryModel();
        $inventoryModel->delete($id);

        return redirect()->to('/inventory')->with('success', 'Item deleted successfully!');
    }
}
