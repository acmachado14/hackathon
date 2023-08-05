<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $table = 'telefones'; // Nome da tabela no banco de dados

    protected $primaryKey = 'idTelefone'; // Nome da coluna da chave primária

    protected $fillable = [
        'telefone',
    ];
}
