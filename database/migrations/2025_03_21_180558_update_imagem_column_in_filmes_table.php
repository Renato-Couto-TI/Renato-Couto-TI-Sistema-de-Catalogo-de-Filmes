<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateImagemColumnInFilmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Atualiza a coluna 'imagem' para todos os registros
        DB::table('filmes')->whereNull('imagem')->update([
            'imagem' => DB::raw("CONCAT(REPLACE(nome_filme, ' ', '_'), '.jpg')")
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        DB::table('filmes')->update(['imagem' => null]);
    }
}

