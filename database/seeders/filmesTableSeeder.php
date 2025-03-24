<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class filmesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserindo filmes ao catálogo do Banco de Dados - para os meus testes iniciais
        DB::table('filmes')->insert([
            [
                'nome_filme' => 'Pato Pato Ganso',
                'ano_lancamento' => 2018,
                'categoria' => 'Infantil',
                'descricao' => 'Depois de sofrer uma lesão, um ganso solteiro precisa cuidar de dois patinhos órfãos enquanto experimentam o perigo e a beleza do mundo exterior.',
                'imagem' => 'Pato_Pato_Ganso.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'Oblivion',
                'ano_lancamento' => 2013,
                'categoria' => 'Ficção',
                'descricao' => 'Em 2077, Jack Harper é o responsável pela manutenção de equipamentos de segurança em um planeta Terra irreconhecível...',
                'imagem' => 'Oblivion.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'Agente das Sombras',
                'ano_lancamento' => 2022,
                'categoria' => 'Ação',
                'descricao' => 'Travis Block trabalha para o FBI, mas não é um agente comum...',
                'imagem' => 'Agente_das_Sombras.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'Código de Conduta',
                'ano_lancamento' => 2009,
                'categoria' => 'Ação',
                'descricao' => 'Um dos suspeitos do assassinato de sua mulher e filha é solto...',
                'imagem' => 'Código_de_Conduta.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'Moana',
                'ano_lancamento' => 2017,
                'categoria' => 'Animação',
                'descricao' => 'Moana Waialiki é uma corajosa jovem...',
                'imagem' => 'moana.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'Colombiana - Em Busca de Vingança',
                'ano_lancamento' => 2011,
                'categoria' => 'Ação',
                'descricao' => 'A jovem Cataleya testemunha a morte dos pais...',
                'imagem' => 'Colombiana_Em_Busca_de_Vingança.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'De Volta à Ação',
                'ano_lancamento' => 2025,
                'categoria' => 'Ação',
                'descricao' => 'Quinze anos depois de abandonar a CIA...',
                'imagem' => 'De_Volta_à_Ação.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'Ilha do Medo',
                'ano_lancamento' => 2010,
                'categoria' => 'Suspense',
                'descricao' => 'Nos anos 1950, a fuga de uma assassina...',
                'imagem' => 'Ilha_do_Medo.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'O Hóspede',
                'ano_lancamento' => 2014,
                'categoria' => 'Suspense',
                'descricao' => 'Soldado chega à casa da família Peterson...',
                'imagem' => 'O_Hóspede.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'Gente Grande',
                'ano_lancamento' => 2010,
                'categoria' => 'Comédia',
                'descricao' => 'A morte do treinador de basquete...',
                'imagem' => 'Gente_Grande.jpg', // Nome da imagem
            ],
            [
                'nome_filme' => 'A Proposta',
                'ano_lancamento' => 2009,
                'categoria' => 'Romance',
                'descricao' => 'Prestes a ser deportada e a perder o seu emprego...',
                'imagem' => 'A_proposta.jpg', // Nome da imagem
            ],
        ]);
    }
}

