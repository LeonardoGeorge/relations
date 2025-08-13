<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\InvoiceController;

//Rota para usuarios
Route::get('/users', [UserController::class, 'index']);
//Buscar usuário por ID
Route::get('/users/{id}', [UserController::class, 'findOne']);
//Inclui a rota para criar um novo usuário
Route::post('/users', [UserController::class, 'create']);

//Rota para listar endereços de um usuário
Route::get('/addresses', [AddressController::class, 'index']);
//Buscar endereço por ID
Route::get('/addresses/{id}', [AddressController::class, 'findOne']);
//Inclui a rota para criar um novo endereço
Route::post('/addresses', [AddressController::class, 'create']);


//Rota para listar endereços de um usuário
Route::get('/invoices', [InvoiceController::class, 'index']);

// Buscar invoice por ID
Route::get('/invoices/{id}', [InvoiceController::class, 'findOne']);

//Inclui a rota para criar um novo endereço
Route::post('/invoice', [InvoiceController::class, 'create']);
