<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');

//            $nomeArquivo = time() . '_' . $images->getClientOriginalName();
//            $caminho = public_path('imagens');
//            $images->move($caminho, $nomeArquivo);

//            foreach ($images as $image){
                $images->store('images', 'public');
//                dd($images);
//            }

            return response()->json(['mensagem' => 'Imagem enviada com sucesso!']);
        }

        return response()->json(['erro' => 'Nenhuma imagem enviada'], 400);
    }
}
