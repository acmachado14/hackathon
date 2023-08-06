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
            $images->store('images', 'public');
            return response()->json(['mensagem' => 'Imagem enviada com sucesso!']);
        }

        return response()->json(['erro' => 'Nenhuma imagem enviada'], 400);
    }

    public function saveOnFile($images){
        $images->store('images', 'public');
        return $images->hashName();
    }

    public function detectRG(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getPathname();

            $textoExtraido = $this->extractTextFromImage($image);

            // Verificando se o texto extraído contém padrões comuns de RG
            $validacao = [
                'NACIONAL', 'RG', 'identidade', 'cpf', 'DENATRAN', 'CONTRAN'
            ];

            if ($this->compareStrings($validacao, $textoExtraido)) {
                return response()->json(['resultado' => 'Documento RG detectado']);
            } else {
                return response()->json(['resultado' => 'Documento nao identificado como RG']);
            }
        }

        return response()->json(['erro' => 'Nenhuma imagem enviada'], 400);
    }

    public function extractTextFromImage($imagePath): string
    {
        // Lendo a imagem e obtendo os dados binários
        $imageData = file_get_contents($imagePath);
        $size = filesize($imagePath);

        // Usando o Tesseract para extrair o texto da imagem
        $ocr = new TesseractOCR();
        $ocr->imageData($imageData, $size);
        $textoExtraido = $ocr->run();

        return $textoExtraido;
    }

    // Função para calcular o índice de similaridade Jaccard entre duas strings
    private function jaccardSimilarity($str1, $str2)
    {
        $set1 = array_unique(str_split($str1));
        $set2 = array_unique(str_split($str2));
        $intersection = array_intersect($set1, $set2);
        $union = array_merge($set1, $set2);
        return count($intersection) / count($union);
    }

    public function compareStrings(array $stringArray, string $compareString, float $threshold = 0.5): bool
    {
        // Converter a string de comparação e as strings do vetor para letras minúsculas
        $compareString = strtolower($compareString);
        $stringArray = array_map('strtolower', $stringArray);

        // Quebrar a string de comparação em palavras
        $compareWords = preg_split('/\s+/', $compareString, -1, PREG_SPLIT_NO_EMPTY);

        // Comparar a similaridade Jaccard entre a string de comparação e cada string do vetor
        foreach ($stringArray as $string) {
            foreach ($compareWords as $compareWord) {
                if ($this->jaccardSimilarity($string, $compareWord) >= $threshold) {
                    return true;
                }
            }
        }

        return false;
    }
}
