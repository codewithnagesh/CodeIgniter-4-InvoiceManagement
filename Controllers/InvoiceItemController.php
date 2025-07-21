<?php

namespace App\Controllers;

use App\Models\InvoiceItemModel;

/**
 * InvoiceItemController
 *
 * Manages items within an invoice, including adding, editing, and deleting.
 */
class InvoiceItemController extends BaseController
{
    /**
     * Add a new item to an invoice.
     */
    public function add($invoiceId)
    {
        $invoiceItemModel = new InvoiceItemModel();

        $data = [
            'invoice_id' => $invoiceId,
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
        ];
        $invoiceItemModel->insert($data);

        return redirect()->to("/invoices/view/$invoiceId")->with('success', 'Item added successfully!');
    }

    /**
     * Delete an item from an invoice.
     */
    public function delete($id)
    {
        $invoiceItemModel = new InvoiceItemModel();
        $item = $invoiceItemModel->find($id);
        $invoiceItemModel->delete($id);

        return redirect()->to("/invoices/view/{$item['invoice_id']}")->with('success', 'Item deleted successfully!');
    }
}
