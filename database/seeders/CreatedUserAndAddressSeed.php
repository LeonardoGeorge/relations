<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreatedUserAndAddressSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            "name" => "Novo saasdasddasasa",
            "email" => "novasdasdodasdsdas@email.com",
            "password" => Hash::make('12345678'),
        ]);

        DB::table('addresses')->insert([
            "street" => "Rua das Flores, 123",
        ]);
    }
}
