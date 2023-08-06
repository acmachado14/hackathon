<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'Reportes';

    protected $primaryKey = 'idReportes';

    public $timestamps = false;

    protected $fillable = [
        'tipoReporte',
        'nomeReportador',
        'centroDeCusto',
        'referenciaDaAreaDeAtuacao',
        'descricaoReporte',
        'localizacao_idlocalizacao',
    ];

    public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'localizacao_idlocalizacao', 'idlocalizacao');
    }
}
