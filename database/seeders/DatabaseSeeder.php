<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //USER

        DB::table('users')->insert([
            'name' => 'Client',
            'tipo' => 'Client',
            'email' => 'clientes@lista.com',
            'password' => bcrypt('12345678'),
        ]);

        //STATUS

        DB::table('status')->insert([
            'status' => 'EM ANDAMENTO',
        ]);

        DB::table('status')->insert([
            'status' => 'FEITO',
        ]);

        DB::table('status')->insert([
            'status' => 'DELETADO',
        ]);

        //FORMA PAGAMENTO
        DB::table('forma_pagamento')->insert([
            'forma' => 'PIX',
        ]);

        DB::table('forma_pagamento')->insert([
            'forma' => 'DEBITO',
        ]);

        DB::table('forma_pagamento')->insert([
            'forma' => 'CREDITO',
        ]);

        DB::table('forma_pagamento')->insert([
            'forma' => 'DINHEIRO',
        ]);


    }
}
