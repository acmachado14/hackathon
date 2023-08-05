<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;
use thiagoalessio\TesseractOCR\TesseractOCR;

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

    public function detectRG(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getPathname();

            $textoExtraido = $this->extractTextFromImage($image);

            // Verificando se o texto extraído contém padrões comuns de RG
            if (preg_match('/[A-Z]{2}[0-9]{9}/', $textoExtraido)) {
                return response()->json(['resultado' => 'Documento RG detectado']);
            } else {
                return response()->json(['resultado' => 'Documento não identificado como RG']);
            }
        }

        return response()->json(['erro' => 'Nenhuma imagem enviada'], 400);
    }

    private function extractTextFromImage($imagePath): String
    {
        // Usando a biblioteca GD para ler a imagem e obter os dados binários
        $imageData = file_get_contents($imagePath);
        $size = strlen($imageData);

        // Criando uma imagem GD a partir dos dados binários
        $image = imagecreatefromstring($imageData);

        // Salvando a imagem em formato PNG para ser usado pelo Tesseract
        ob_start();
        imagepng($image);
        $imageData = ob_get_clean();

        // Usando o Tesseract para extrair o texto da imagem
        $ocr = new TesseractOCR();
        $ocr->imageData($imageData, $size);
        $textoExtraido = $ocr->run();

        return $textoExtraido;
    }

}
