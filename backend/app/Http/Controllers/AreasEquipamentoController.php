<?php

namespace App\Http\Controllers;

use App\Models\AreasEquipamento;
use Illuminate\Http\Request;

class AreasEquipamentoController extends Controller
{
    public function cadastrarAreasEquipamento(Request $request)
    {
        $request->validate([
            'fields' => 'required'
        ]);

        $jsonFields = json_decode($request['fields']);

        $area = new AreasEquipamento();
        $area->codigoAreaEquipamento = $jsonFields->codigo;
        $area->descricaoAreaEquipamento = $jsonFields->nome;
        $area->statusLiberacao = $jsonFields->statusLiberacao;

        $imageController = new ImageController();

        $arquivo = $request->file('filePDFDescritivo');
        if(isset($arquivo)){
            $area->anexoPDFDescritivo = $imageController->saveOnFile($arquivo);
        }

        $area->save();

        return response()->json(['message' => 'Cadastrado com Sucesso'], 202);
    }
}
