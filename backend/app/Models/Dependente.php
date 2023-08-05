<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'dependentes';

    protected $primaryKey = 'idDependente';

    protected $fillable = [
        'numCPFDependente',
        'nomeDependente',
        'sexoDependente',
        'dataNascimentoDependente',
        'grauParentesco',
        'idCandidato',
    ];

    // Relação com o modelo Candidato
    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'idCandidato', 'idCandidato');
    }
}
