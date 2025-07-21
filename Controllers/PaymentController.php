<?php

namespace App\Controllers;

use App\Models\PaymentModel;

/**
 * PaymentController
 *
 * Manages the payment processing for invoices.
 */
class PaymentController extends BaseController
{
    /**
     * Show payment form for an invoice.
     */
    public function process($invoiceId)
    {
        return view('payments/process', ['invoiceId' => $invoiceId]);
    }

    /**
     * Record a payment for an invoice.
     */
    public function store()
    {
        $paymentModel = new PaymentModel();

        $data = [
            'invoice_id' => $this->request->getPost('invoice_id'),
            'amount' => $this->request->getPost('amount'),
            'payment_method' => $this->request->getPost('payment_method'),
        ];
        $paymentModel->insert($data);

        return redirect()->to('/invoices')->with('success', 'Payment recorded successfully!');
    }
}
