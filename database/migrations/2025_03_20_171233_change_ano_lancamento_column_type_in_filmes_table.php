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
        $table->integer('ano_lançamento')->change();
    });
}

    public function down()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->string('ano_lançamento')->change();
        });
    }

};
