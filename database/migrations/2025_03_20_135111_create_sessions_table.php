<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Execute as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->text('payload');
            $table->integer('last_activity');
        });
    }

    /**
     * Reverter as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}

