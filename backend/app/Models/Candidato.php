<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidato extends Model
{
    use HasFactory;

    protected $table = 'candidatos'; // Nome da tabela no banco de dados

    protected $primaryKey = 'idCandidato'; // Assuming 'numCPF' is the primary key

    protected $fillable = [
        'nomeCandidato',
        'nomeMae',
        'nomePai',
        'sexoCandidato',
        'estadoCivil',
        'grauInstrucao',
        'racaCor',
        'dataNascimentoCandidato',
        'nacionalidade',
        'paisNascimento',
        'estadoNascimento',
        'cidadeNascimento',
        'numeroBotina',
        'numeroCalca',
        'tamanhoCamisa',
        'email',
        'numIdentidade',
        'orgaoEmissorIdentidade',
        'estadoOrgaoEmissor',
        'cidadeEmissaoIdentidade',
        'dataExpedicaoIdentidade',
        'numCPF',
        'numPisPasep',
        'anexoIdentidade',
        'anexoCPF',
        'anexoCurriculo',
        'anexoCNH',
        'anexoCertificadoReservista',
        'status',
        'idEndereco',
        'idFuncao',
    ];

    // Relação com o modelo Dependente
    public function dependentes(): HasMany
    {
        return $this->hasMany(Dependente::class, 'idCandidato', 'idCandidato');
    }

    public function agendamentoFerias(): HasMany
    {
        return $this->hasMany(SolicitacoesAgendamentosFerias::class, 'idCandidato', 'idCandidato');
    }

    public function agendamentoRecisao(): HasMany
    {
        return $this->hasMany(SolicitacoesAgendamentosRecisao::class, 'idCandidato', 'idCandidato');
    }

    // Relação com a tabela de Endereços
    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'idEndereco');
    }

    public function funcao(): BelongsTo
    {
        return $this->belongsTo(Funcao::class, 'idFuncao');
    }


}
