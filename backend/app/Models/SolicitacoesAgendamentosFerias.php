<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacoesAgendamentosFerias extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes_agendamentos_ferias';

    protected $primaryKey = 'idAgendamentosFerias';

    protected $fillable = [
        'dataSolicitacaoFerias',
        'dataAprovacaoReprovacaoFerias',
        'dataInicioFerias',
        'diasSolicitados',
        'diasAprovados',
        'idCandidato'
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'idCandidato', 'idCandidato');
    }
}
