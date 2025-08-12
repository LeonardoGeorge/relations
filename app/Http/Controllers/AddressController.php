<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $r)
    {
        $adresses = Address::all();
        return $adresses;
    }

    public function findOne(Request $r) {
        $address = Address::find($r->id);
        return $address;
    }

    // Criar novo endereço
    public function create(Request $r) {
        $validateData = $r->validate([
            'street' => 'required|string|max:255',
        ]);
        $address = Address::create(
            [
                'street' => $validateData['street'],
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
    //Mostra endereço especifico
    public function show($id)
    {
        $address = Address::findOrFail($id);
        return response()->json($address);      
    }    
}
