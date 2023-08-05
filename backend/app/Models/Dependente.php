<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'Dependentes';

    protected $primaryKey = ['idDependente', 'idCandidato'];

    protected $keyType = 'int';

    public $incrementing = false;

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
