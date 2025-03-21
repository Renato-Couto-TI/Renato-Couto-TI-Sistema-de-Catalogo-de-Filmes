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
        //inserindo alguns filmes ao catálogo do Banco de Dados
        DB::table('filmes')->insert([
            [
                'nome_filme'=> 'Pato Pato Ganso',
                'ano_lançamento' => 2018,
                'categoria' => 'Infantil',
                'descricao' => 'Depois de sofrer uma lesão, um ganso solteiro precisa cuidar de dois patinhos órfãos enquanto experimentam o perigo e a beleza do mundo exterior.',
            ],
        
            [
                'nome_filme'=> 'Oblivion',
                'ano_lancamento' => 2013,
                'categoria' => 'Ficção',
                'descricao' => 'Em 2077, Jack Harper é o responsável pela manutenção de equipamentos de segurança em um planeta Terra irreconhecível, que foi destruído por uma raça alienígena. O que restou da humanidade vive hoje em uma colônia lunar, para onde Jack irá assim que terminar seu trabalho na Terra. Porém um dia, ele encontra a espaçonave de uma mulher e, ao conhecê-la, tudo o que Jack sabe até então é posto em dúvida, iniciando-se uma jornada em que ele precisará descobrir o que realmente aconteceu no passado.',
            ],
        
            [
                'nome_filme'=> 'Agente das Sombras',
                'ano_lancamento' => 2022,
                'categoria' => 'Ação',
                'descricao' => 'Travis Block trabalha para o FBI, mas não é um agente comum. Ele se move pelo mundo das sombras, pelos bastidores, ajudando agentes secretos que se veem em uma situação da qual não conseguem escapar. Ele acaba envolvido em uma conspiração quando um agente secreto questiona os seus superiores. Agora, cabe a Block encontrar esse sujeito, e também descobrir se não está sendo usado pelo homem em quem confia.',
            ],

            [
                'nome_filme'=> 'Código de Conduta',
                'ano_lancamento' => 2009,
                'categoria' => 'Ação',
                'descricao' => 'Um dos suspeitos do assassinato de sua mulher e filha é solto, e Clyde parte para a vingança decidindo fazer justiça com as próprias mãos. O homem é preso e, dentro da cadeia, organiza uma matança para desmascarar o sistema judicial corrupto.',
            ],

            [
                'nome_filme'=> 'Moana',
                'ano_lancamento' => 2017,
                'categoria' => 'Animação',
                'descricao' => 'Moana Waialiki é uma corajosa jovem, filha única do chefe de uma tribo na Oceania, vinda de uma longa linhagem de navegadores. Quando os pescadores de sua ilha não conseguem pescar nenhum peixe e as colheitas falham, ela descobre que o semideus Maui causou a praga ao roubar o coração da deusa Te Fiti. Entusiasta das viagens marítimas, a jovem se vê querendo descobrir mais sobre seu passado e ajudar a comunidade, mesmo que a família queira proteger Moana a qualquer custo. Então, ela resolve partir em busca de seus ancestrais, habitantes de uma ilha mítica que ninguém sabe onde é. A única maneira de curar a ilha é persuadir Maui a devolver o coração de Te Fiti.',
            ],

            [
                'nome_filme'=> 'Colombiana - Em Busca de Vingança',
                'ano_lancamento' => 2011,
                'categoria' => 'Ação',
                'descricao' => 'A jovem Cataleya testemunha a morte dos pais quando pequena e, ao crescer, se torna uma assassina profissional. Trabalhando para o tio, ela busca vingança contra o criminoso que matou sua família.',
            ],

            [
                'nome_filme'=> 'De Volta à Ação',
                'ano_lancamento' => 2025,
                'categoria' => 'Ação',
                'descricao' => 'Quinze anos depois de abandonar a CIA para formar uma família, os ex-agentes de elite Matt e Emily voltam ao mundo da espionagem ao terem seus disfarces revelados.',
            ],

            [
                'nome_filme'=> 'Ilha do Medo',
                'ano_lancamento' => 2010,
                'categoria' => 'Suspense',
                'descricao' => 'Nos anos 1950, a fuga de uma assassina leva o detetive Teddy Daniels e seu parceiro a investigarem o seu desaparecimento de um quarto trancado em um hospital psiquiátrico. Lá, uma rebelião se inicia e o agente terá que enfrentar seus próprios medos.',
            ],

            [
                'nome_filme'=> 'O Hóspede',
                'ano_lancamento' => 2014,
                'categoria' => 'Suspense',
                'descricao' => 'Soldado chega à casa da família Peterson e diz ser amigo do filho, morto em combate. Ele é acolhido por todos, mas uma série de mortes começa a acontecer e o rapaz mostra suas reais intenções.',
            ],

            [
                'nome_filme'=> 'Gente Grande',
                'ano_lancamento' => 2010,
                'categoria' => 'Comédia',
                'descricao' => 'A morte do treinador de basquete de infância de velhos amigos reúne a turma no mesmo lugar que celebraram um campeonato anos atrás. Os amigos, acompanhados de suas esposas e filhos, descobrem que idade não significa o mesmo que maturidade.',
            ],

            [
                'nome_filme'=> 'A Proposta',
                'ano_lancamento' => 2009,
                'categoria' => 'Romance',
                'descricao' => 'Prestes a ser deportada e a perder o seu emprego onde ocupa um cargo de alto poder, a workaholic Margaret (Sandra Bullock), anuncia que está noiva do seu incauto assistente, Andrew (Ryan Reynolds), que não sabe de nada.',
            ],
        
            ]);
    }
}
