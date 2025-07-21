<?php

namespace App\Controllers;

use App\Models\InvoiceModel;

/**
 * InvoiceController
 *
 * Handles actions like creating invoices, sending reminders, and updating invoice status.
 */
class InvoiceController extends BaseController
{
    /**
     * Display all invoices.
     */
    public function index()
    {
        $invoiceModel = new InvoiceModel();
        $data['invoices'] = $invoiceModel->findAll();

        return view('invoices/index', $data);
    }

    /**
     * Show the form to create a new invoice.
     */
    public function create()
    {
        return view('invoices/create');
    }

    /**
     * Save a new invoice to the database.
     */
    public function store()
    {
        $invoiceModel = new InvoiceModel();
        $data = [
            'client_name' => $this->request->getPost('client_name'),
            'due_date' => $this->request->getPost('due_date'),
            'amount' => $this->request->getPost('amount'),
            'status' => 'pending'
        ];
        $invoiceModel->insert($data);

        return redirect()->to('/invoices')->with('success', 'Invoice created successfully!');
    }

    /**
     * Update the status of an invoice.
     *
     * @param int $id Invoice ID.
     */
    public function updateStatus($id)
    {
        $invoiceModel = new InvoiceModel();
        $status = $this->request->getPost('status');
        $invoiceModel->update($id, ['status' => $status]);

        return redirect()->back()->with('success', 'Invoice status updated!');
    }

    /**
     * Send reminders for pending invoices.
     */
    public function sendReminders()
    {
        $invoiceModel = new InvoiceModel();
        $pendingInvoices = $invoiceModel->where('status', 'pending')->findAll();

        foreach ($pendingInvoices as $invoice) {
            // Simulate sending email (logic can be extended)
            log_message('info', "Reminder sent to client: {$invoice['client_name']} for Invoice ID: {$invoice['id']}");
        }

        return redirect()->back()->with('success', 'Reminders sent successfully!');
    }
}
