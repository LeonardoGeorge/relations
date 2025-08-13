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
    public function create(Request $r)
    {
        $rawData = $r->only('street');
        $address = Address::create($rawData);
        return $address;
    }
}
