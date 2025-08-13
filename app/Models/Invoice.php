<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $table = 'invoices';
    protected $fillable = [
        'descricao',
        'valor',
        'address_id',
        'user_id',
    ];
    use HasFactory;

    public function Address() {
        return $this->hasOne(Address::class, 'id','address_id');
    }

    public function User() {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
