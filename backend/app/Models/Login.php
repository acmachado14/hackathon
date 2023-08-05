<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Login extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'logins';

    protected $primaryKey = 'id'; // Defina o nome da chave primária aqui

    public $incrementing = true; // Defina como true para usar autoincremento

    protected $fillable = [
        'login',
        'senha',
    ];
}
