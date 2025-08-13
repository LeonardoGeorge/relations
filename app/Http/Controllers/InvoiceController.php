<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $r)
    {
        $invoices = Invoice::all();
        return $invoices;
    }

    public function findOne(Request $r) {
        $invoice = Invoice::find($r->id);
        return $invoice->user()->get();
    }

    public function create(Request $r)
    {
        // Obtém apenas os campos necessários
        $rawData = $r->only('descricao', 'valor', 'address_id', 'user_id');

        // Verifica se todos os campos obrigatórios estão presentes
        if (count($rawData) !== 4) {
            return response()->json([
                'error' => 'Todos os campos (descricao, valor, address_id, user_id) são obrigatórios'
            ], 400);
        }

        // Cria a invoice
        $invoice = Invoice::create($rawData);

        return $invoice;
    }
}
