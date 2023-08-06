<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Localizacao;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function cadastararReporte(Request $request)
    {
        $request->validate([
            'fields' => 'required',
        ]);

        $jsonFields = json_decode($request['fields']);

        $localizacao = Localizacao::create([
            'latitude' => $jsonFields->latitude,
            'longitude' => $jsonFields->longitude,
        ]);

        $reporte = Reporte::create([
            'tipoReporte' => $jsonFields->tipoDeReporte,
            'nomeReportador' => $jsonFields->nome,
            'centroDeCusto' => $jsonFields->centroDeCusto,
            'referenciaDaAreaDeAtuacao' => $jsonFields->referenciaDaAreaDeAtuacao,
            'descricaoReporte' => $jsonFields->descricao,
            'idlocalizacao' => $localizacao->idlocalizacao,
        ]);

        $imageController = new ImageController();

        $foto1 = $request->file('foto1');
        if(isset($foto1)){

            $foto = Foto::create([
                'idReporte' => $reporte->idReporte,
                'foto' => $imageController->saveOnFile($foto1),
            ]);
        }

        $foto2 = $request->file('foto2');
        if(isset($foto2)){

            $foto = Foto::create([
                'idReporte' => $reporte->idReporte,
                'foto' => $imageController->saveOnFile($foto2),
            ]);
        }

        $foto3 = $request->file('foto3');
        if(isset($foto3)){

            $foto = Foto::create([
                'idReporte' => $reporte->idReporte,
                'foto' => $imageController->saveOnFile($foto3),
            ]);
        }

        return response()->json(['message' => 'Cadastrado com Sucesso'], 202);
    }

}
