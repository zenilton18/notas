<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nome' => 'usuario1@gmail.com',
                'senha' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nome' => 'usuario2@gmail.com',
                'senha' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nome' => 'usuario3@gmail.com',
                'senha' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ]
            ]);
    }
}
