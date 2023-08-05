<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos'; // Nome da tabela no banco de dados

    protected $primaryKey = 'idEndereco'; // Nome da coluna da chave primária

    protected $fillable = [
        'CEP',
        'pais',
        'estado',
        'cidade',
        'bairro',
        'tipoLogradouro',
        'enderecoResidencial',
        'numeroResidencia',
        'complementoEndereco',
    ];

}
