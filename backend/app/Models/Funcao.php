<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $table = 'funcoes'; // Nome da tabela no banco de dados

    protected $primaryKey = 'codigoFuncao'; // Nome da coluna da chave primária

    protected $fillable = [
        'codigoFuncao',
        'descricao',
        'cbo',
    ];
}
