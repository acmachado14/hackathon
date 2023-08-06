<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasEquipamento extends Model
{
    use HasFactory;

    protected $table = 'areas_ou_equipamentos';

    protected $primaryKey = 'idAreaEquipamento';

    protected $fillable = [
        'codigoAreaEquipamento',
        'descricaoAreaEquipamento',
        'statusLiberacao',
        'anexoPDFDescritivo'
    ];
}
