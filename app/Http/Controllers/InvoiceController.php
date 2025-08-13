<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Invoice;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $r)
    {
        $invoices = Invoice::all();
        return $invoices;
    }
    public function create(Request $r)
    {
        $rawData = $r->only('descricao', 'valor', 'address_id', 'user_id');

        $invoice = Invoice::create($rawData);

        return $invoice;
    }
}
