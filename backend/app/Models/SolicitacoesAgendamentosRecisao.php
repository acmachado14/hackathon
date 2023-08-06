<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacoesAgendamentosRecisao extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes_agendamentos_recisao';

    protected $primaryKey = 'idAgendamentosRecisao';

    protected $fillable = [
        'dataSolicitacaoRecisao',
        'dataAprovacaoReprovacaoRecisao',
        'motivo',
        'rankRecontratacao',
        'statusRecisao',
        'idCandidato'
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'idCandidato', 'idCandidato');
    }
}
