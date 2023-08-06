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

        if(isset($request['foto1'])){
            $foto1 = $request->file('foto1');

            $foto = Foto::create([
                'idReporte' => $reporte->idReporte,
                'foto' => $imageController->saveOnFile($foto1),
            ]);
        }

        if(isset($request['foto2'])){
            $foto2 = $request->file('foto2');

            $foto = Foto::create([
                'idReporte' => $reporte->idReporte,
                'foto' => $imageController->saveOnFile($foto2),
            ]);
        }

        if(isset($request['foto3'])){
            $foto3 = $request->file('foto3');

            $foto = Foto::create([
                'idReporte' => $reporte->idReporte,
                'foto' => $imageController->saveOnFile($foto3),
            ]);
        }

        return response()->json(['message' => 'Cadastrado com Sucesso'], 202);
    }

}