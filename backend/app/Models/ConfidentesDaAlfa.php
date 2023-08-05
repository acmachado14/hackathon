<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfidentesDaAlfa extends Model
{
    use HasFactory;

    protected $table = 'confidentes_da_alfa';

    protected $primaryKey = 'idConfidenteDaAlfa';

    protected $fillable = [
        'nomeConfidenteNaAlfa',
        'cidade',
        'funcao',
        'idCandidato'
    ];

    // Relacionamento com a tabela 'Canditatos'
    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'idCandidato', 'idCandidato');
    }
}
