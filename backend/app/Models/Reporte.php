<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function fotos(): HasMany
    {
        return $this->hasMany(Foto::class, 'idReporte', 'idReporte');
    }
}
