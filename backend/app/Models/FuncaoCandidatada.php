<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncaoCandidatada extends Model
{
    use HasFactory;

    protected $table = 'funcao_candidatada';

    protected $primaryKey = ['idCandidato', 'idFuncao'];

    protected $fillable = [
        'idCandidato',
        'idFuncao',
        'ehPrincipal',
    ];


    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'idCandidato', 'idCandidato');
    }

    public function funcao()
    {
        return $this->belongsTo(Funcao::class, 'idFuncao', 'idFuncao');
    }

}
