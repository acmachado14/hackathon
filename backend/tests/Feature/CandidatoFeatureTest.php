<?php

namespace Tests\Feature;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Funcao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CandidatoFeatureTest extends TestCase
{
    use RefreshDatabase;

    private $funcao;
    private $endereco;
    private $candidato;

    public function setUp(): void
    {
        parent::setUp();
        $this->funcao = Funcao::factory()->create();
        $this->endereco = Endereco::factory()->create();
    }

    public function testRotaListarCandidato(){
        //DADO que tenho candidatos cadastrados
        Candidato::factory()->count(3)->create([
            'idEndereco' => $this->endereco->idEndereco,
            'idFuncao' => $this->funcao->idFuncao,
        ]);

        //QUANDO faco a requisicao para rota de listar candidatos
        $response = $this->get('/api/candidatos');

        //ENTAO ela deve retornar status code 200
        $response->assertStatus(200);

        //E possuir uma estrutura padrao de dados
        $response->assertJsonStructure([
            '*' => [
                'idCandidato',
                'nomeCandidato',
                'status',
                'codigoFuncao',
                'descricao'
            ],
        ]);

        //E retornar exatamnte os tres criados
        $response->assertJsonCount(3);
    }

    public function testRotaListarCandidatoPorId(){
        //DADO que tenho um candidato cadastrado
        $candidato = Candidato::factory()->create([
            'idEndereco' => $this->endereco->idEndereco,
            'idFuncao' => $this->funcao->idFuncao,
        ]);

        //QUANDO faco a requisicao para rota de listar candidatos
        $response = $this->get('/api/candidatos/'. $candidato->idCandidato);

        //ENTAO ela deve retornar status code 200
        $response->assertStatus(200);

        //E possuir uma estrutura padrao de dados
        $response->assertJsonStructure([
            'idCandidato',
            'nomeCandidato',
            'nomeMae',
            'nomePai',
            'sexoCandidato',
            'estadoCivil',
            'grauInstrucao',
            'racaCor',
            'dataNascimentoCandidato',
            'nacionalidade',
            'paisNascimento',
            'estadoNascimento',
            'cidadeNascimento',
            'numeroBotina',
            'numeroCalca',
            'tamanhoCamisa',
            'email',
            'numIdentidade',
            'orgaoEmissorIdentidade',
            'estadoOrgaoEmissor',
            'cidadeEmissaoIdentidade',
            'dataExpedicaoIdentidade',
            'numCPF',
            'numPisPasep',
            'anexoIdentidade',
            'anexoCPF',
            'anexoCurriculo',
            'anexoCNH',
            'anexoCertificadoReservista',
            'status',
            'idEndereco',
            'idFuncao',
            'created_at',
            'updated_at',
            'endereco' => [
                'idEndereco',
                'CEP',
                'pais',
                'estado',
                'cidade',
                'bairro',
                'tipoLogradouro',
                'enderecoResidencial',
                'numeroResidencia',
                'complementoEndereco',
                'created_at',
                'updated_at',
            ],
            'dependentes',
        ]);
    }
}
