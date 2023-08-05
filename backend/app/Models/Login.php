<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'login';

    protected $primaryKey = false;

    protected $fillable = [
        'login',
        'senha',
        'idCandidato',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'idCandidato', 'idCandidato');
    }
}
