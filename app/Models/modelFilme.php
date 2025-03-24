<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelFilme extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'filmes';

    protected $fillable = [
        'nome_filme',
        'ano_lancamento',
        'categoria',
        'descricao',
        'imagem',
    ];

    protected $dates = ['deleted_at'];
}




