<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    use HasFactory;

    protected $table = 'localizacoes';

    protected $primaryKey = 'idlocalizacao';

    protected $fillable = [
        'latitude',
        'longitude',
    ];
}
