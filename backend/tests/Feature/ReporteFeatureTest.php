<?php

namespace Tests\Feature;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Funcao;
use App\Models\Localizacao;
use App\Models\Reporte;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReporteFeatureTest extends TestCase
{
    use RefreshDatabase;

    private $localizacao;
    private $reporte;

    public function setUp(): void
    {
        parent::setUp();
        $this->localizacao = Localizacao::create([
            'latitude' => 20.1232,
            'longitude' => -44.1232,
        ]);

        $this->reporte = Reporte::create([
            'tipoReporte' => 'Teste',
            'nomeReportador' => 'Teste',
            'centroDeCusto' => 'Teste',
            'referenciaDaAreaDeAtuacao' => 'Teste',
            'descricaoReporte' => 'Teste',
            'idlocalizacao' => $this->localizacao->idlocalizacao,
        ]);
    }

    public function testRotaListarReporte(){
        //DADO que tenho reportes cadastrados

        //QUANDO faco a requisicao para rota de listar candidatos
        $response = $this->get('/api/reporte');

        //ENTAO ela deve retornar status code 200
        $response->assertStatus(200);

        //E possuir uma estrutura padrao de dados
        $response->assertJsonStructure([
            '*' => [
                'idReporte',
                'tipoReporte',
                'nomeReportador',
                'centroDeCusto',
                'referenciaDaAreaDeAtuacao',
                'descricaoReporte',
                'idlocalizacao',
                'created_at',
                'updated_at',
                'localizacao' => [
                    'idlocalizacao',
                    'latitude',
                    'longitude',
                    'created_at',
                    'updated_at',
                ],
                'fotos' => [
                    '*' => [
                        'idFotos',
                        'idReporte',
                        'foto',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ],
        ]);
    }

    public function testRotaListarReportePorId()
    {
        //DADO que tenho um reporte cadastrados

        //QUANDO faco a requisicao para rota de listar candidatos
        $response = $this->get('/api/reporte/' . $this->reporte->idReporte);

        //ENTAO ela deve retornar status code 200
        $response->assertStatus(200);

        //E possuir uma estrutura padrao de dados
        $response->assertJsonStructure([
            'idReporte',
            'tipoReporte',
            'nomeReportador',
            'centroDeCusto',
            'referenciaDaAreaDeAtuacao',
            'descricaoReporte',
            'idlocalizacao',
            'created_at',
            'updated_at',
            'localizacao' => [
                'idlocalizacao',
                'latitude',
                'longitude',
                'created_at',
                'updated_at',
            ],
            'fotos',
        ]);
    }
}
