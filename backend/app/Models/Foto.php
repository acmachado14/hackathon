<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos'; // Nome da tabela no banco de dados

    protected $primaryKey = 'idFotos'; // Nome da coluna da chave primária

    protected $fillable = [
        'idReporte',
        'foto',
    ];

    public function reporte()
    {
        return $this->belongsTo(Reporte::class, 'idReporte', 'idReporte');
    }
}
