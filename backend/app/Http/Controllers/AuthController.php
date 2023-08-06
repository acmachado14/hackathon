<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Login;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'senha' => 'required|min:6'
        ]);


        if(Candidato::where('numCPF', $request->login)->first() == null){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $login = Login::create([
            'login' => $request->login,
            'senha' => $request->senha
        ]);

        $token = $login->createToken('api_token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'senha' => 'required|min:6'
        ]);

        if (Login::where('login', $request->login)->where('senha', $request->senha)->first() != null) {
            $login = Login::where('login', $request->login)
                ->where('senha', $request->senha)
                ->first();
            $token = $login->createToken('api_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
