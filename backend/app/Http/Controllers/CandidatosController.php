<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\ConfidentesDaAlfa;
use App\Models\Dependente;
use App\Models\Endereco;
use App\Models\Funcao;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CandidatosController extends Controller
{
    public function listarCandidatos(Request $request){
        $candidatos = Candidato::with('funcao')->get();

        $data = [];
        foreach ($candidatos as $candidato){
            $data[] = [
                "idCandidato" => $candidato->idCandidato,
                "nomeCandidato" => $candidato->nomeCandidato,
                "status" => $candidato->status,
                "codigoFuncao" => $candidato->funcao->codigoFuncao,
                "descricao" => $candidato->funcao->descricao,
            ];
        }

        if (!isset($data)) {
            return response()->json([], 204);
        }

        return response()->json($data);
    }

    public function buscarCandidato($id)
    {
        $candidato = Candidato::with('endereco')
            ->with('dependentes')
            ->with('agendamentoFerias')
            ->with('agendamentoRecisao')
            ->find($id);

        if (!isset($candidato)) {
            return response()->json([], 204);
        }

        return response()->json($candidato);
    }


    public function cadastrarCandidato(Request $request)
    {

        $request->validate([
            'fields' => 'required',
            'anexoIdentidade' => 'required',
            'anexoCPF' => 'required',
            'anexoCurriculo' => 'required',
            'anexoCNH' => 'required',
            'anexoCertificadoReservista' => 'required'
        ]);

        $jsonFields = json_decode($request['fields']);

        if(Funcao::find($jsonFields->idFuncao) == null){
            return response()->json(['error' => 'Funcao nao encontrada'], 403);
        }

        $imageController = new ImageController();

        $image = $request->file('anexoIdentidade')->getPathname();

        $textoExtraido = $imageController->extractTextFromImage($image);

        // Verificando se o texto extraído contém padrões comuns de RG
        $validacao = [
            'NACIONAL', 'RG', 'identidade', 'cpf', 'DENATRAN', 'CONTRAN'
        ];

        if (!$imageController->compareStrings($validacao, $textoExtraido)) {
            return response()->json(['error' => 'RG nao e valido'], 403);
        }

        //dd("teste");

        $endereco = $jsonFields->endereco;

        //dd($endereco);
        $enderecoSalvo = Endereco::create([
            'CEP' => $endereco->CEP,
            'pais' => $endereco->pais,
            'estado' => $endereco->estado,
            'cidade' => $endereco->cidade,
            'bairro' => $endereco->bairro,
            'tipoLogradouro' => $endereco->tipoLogradouro,
            'enderecoResidencial' => $endereco->enderecoResidencial,
            'numeroResidencia' => $endereco->numeroResidencia,
            'complementoEndereco' => $endereco->complementoEndereco,
        ]);

        $candidato = new Candidato();
        $candidato->nomeCandidato = $jsonFields->nomeCandidato;
        $candidato->nomeMae = $jsonFields->nomeMae;
        $candidato->nomePai = $jsonFields->nomePai;
        $candidato->sexoCandidato = $jsonFields->sexoCandidato;
        $candidato->estadoCivil = $jsonFields->estadoCivil;
        $candidato->grauInstrucao = $jsonFields->grauInstrucao;
        $candidato->racaCor = $jsonFields->racaCor;
        $dataObj = \DateTime::createFromFormat('d/m/Y', $jsonFields->dataNascimentoCandidato);
        $candidato->dataNascimentoCandidato = $dataObj->format('Y-m-d');
        $candidato->nacionalidade = $jsonFields->nacionalidade;
        $candidato->paisNascimento = $jsonFields->paisNascimento;
        $candidato->estadoNascimento = $jsonFields->estadoNascimento;
        $candidato->cidadeNascimento = $jsonFields->cidadeNascimento;
        $candidato->numeroBotina = $jsonFields->numeroBotina;
        $candidato->numeroCalca = $jsonFields->numeroCalca;
        $candidato->tamanhoCamisa = $jsonFields->tamanhoCamisa;
        $candidato->email = $jsonFields->email;
        $candidato->numIdentidade = $jsonFields->numIdentidade;
        $candidato->orgaoEmissorIdentidade = $jsonFields->orgaoEmissorIdentidade;
        $candidato->estadoOrgaoEmissor = $jsonFields->estadoOrgaoEmissor;
        $candidato->cidadeEmissaoIdentidade = $jsonFields->cidadeEmissaoIdentidade;
        $candidato->dataExpedicaoIdentidade = $jsonFields->dataExpedicaoIdentidade;
        $candidato->numCPF = $jsonFields->numCPF;
        $candidato->numPisPasep = $jsonFields->numPisPasep;
        $candidato->status = $jsonFields->status;
        $candidato->idEndereco = $enderecoSalvo->idEndereco;
        $candidato->idFuncao = $jsonFields->idFuncao;

        $anexoIdentidade = $request->file('anexoIdentidade');
        $anexoCPF = $request->file('anexoCPF');
        $anexoCurriculo = $request->file('anexoCurriculo');
        $anexoCNH = $request->file('anexoCNH');
        $anexoCertificadoReservista = $request->file('anexoCertificadoReservista');

        $candidato->anexoIdentidade = $imageController->saveOnFile($anexoIdentidade);
        $candidato->anexoCPF = $imageController->saveOnFile($anexoCPF);
        $candidato->anexoCurriculo = $imageController->saveOnFile($anexoCurriculo);
        $candidato->anexoCNH = $imageController->saveOnFile($anexoCNH);
        $candidato->anexoCertificadoReservista = $imageController->saveOnFile($anexoCertificadoReservista);

        $candidato->save();

        if($jsonFields->conhecido){
            $confidente = ConfidentesDaAlfa::create([
                'nomeConfidenteNaAlfa' => $jsonFields->nomeConhecido,
                'cidade' => $jsonFields->cidadeConhecido,
                'funcao' => $jsonFields->cargoConhecido,
                'idCandidato' => $candidato->idCandidato,
            ]);

            //dd($confidente);
        }

        $dependentesArray = $jsonFields->dependentes;
        foreach ($dependentesArray as $dependenteData) {
            $dataObj = \DateTime::createFromFormat('d/m/Y', $dependenteData->dataNascimento);
            $dependente = Dependente::create([
                'numCPFDependente' => $dependenteData->cpf,
                'nomeDependente' => $dependenteData->nome,
                'sexoDependente' => $dependenteData->sexo,
                'dataNascimentoDependente' => $dataObj->format('Y-m-d'),
                'grauParentesco' => $dependenteData->grau,
                'idCandidato' => $candidato->idCandidato,
            ]);
        }

        return response()->json(['message' => 'Cadastrado com Sucesso'], 201);
    }
}
