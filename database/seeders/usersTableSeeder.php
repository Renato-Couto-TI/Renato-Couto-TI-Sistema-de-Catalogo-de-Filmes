<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criando 3 usuários hipotéticos para o Banco de Dados
        DB::table('users')->insert([
            [
                'nome_usuario'=> 'usuario1@teste.com',
                'senha' => bcrypt(123456),
                'created_at' => date('Y-m-d H:i:s')
            ],
        
            [
                'nome_usuario'=> 'usuario2@teste.com',
                'senha' => bcrypt(123456),
                'created_at' => date('Y-m-d H:i:s')
            ],
        
            [
                'nome_usuario'=> 'usuario3@teste.com',
                'senha' => bcrypt(123456),
                'created_at' => date('Y-m-d H:i:s')
            ]
        
            ]);
    }
}
