<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->string('imagem')->nullable();  // Adicionando a coluna 'imagem'
        });
    }

    public function down()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->dropColumn('imagem');
        });
    }

};
