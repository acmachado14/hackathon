<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatosHasTelefone extends Model
{
    protected $table = 'candidatos_has_telefone';

    protected $primaryKey = ['idCandidato', 'idTelefone'];

    public $incrementing = false; // Indica que a chave primária não é autoincrementável

    public $timestamps = false; // Indica que a tabela não tem colunas 'created_at' e 'updated_at'

    protected $fillable = [
        'idCandidato',
        'idTelefone',
    ];

    // Relacionamento com a tabela 'candidatos'
    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'idCandidato', 'idCandidato');
    }

    // Relacionamento com a tabela 'telefone'
    public function telefone()
    {
        return $this->belongsTo(Telefone::class, 'idTelefone', 'idTelefone');
    }
}
