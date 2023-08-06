<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reportes';

    protected $primaryKey = 'idReporte';

    protected $fillable = [
        'tipoReporte',
        'nomeReportador',
        'centroDeCusto',
        'referenciaDaAreaDeAtuacao',
        'descricaoReporte',
        'idlocalizacao',
    ];

    public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'idlocalizacao', 'idlocalizacao');
    }
}
