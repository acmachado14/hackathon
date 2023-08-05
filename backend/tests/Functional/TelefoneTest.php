<?php

namespace Tests\Functional;

use App\Models\Telefone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TelefoneTest extends TestCase
{
    use RefreshDatabase;

    private $telefoneData;
    private $telefone;

    public function setUp(): void
    {
        parent::setUp();

        $this->telefoneData = [
            'telefone' => '319812345'
        ];

        $this->telefone = Telefone::create($this->telefoneData);
    }

    public function testInserirTelefone(): void
    {
        //DADO que tenho os dados de um telefone
        $telefone = $this->telefoneData;

        //QUANDO realizo a funcao de cadastrar um telefone
        $telefone = Telefone::create($telefone);

        //ENTAO ele deve ser cadastrado
        $this->assertEquals($this->telefone['telefone'], $telefone->telefone);
    }

    public function testEditarTelefoneExistente(): void
    {
        //DADO que tenho um endereco cadastrado no banco de dados
        $telefone = $this->telefone;

        //QUANDO a funcao para editar é executada
        $novoTelefone = '31123456';
        $telefone->telefone = $novoTelefone;
        $telefone->save();

        //ENTAO o estado deve ser atualizado
        $this->assertEquals($novoTelefone, $telefone->telefone);
    }

    public function testVisualizarTelefone(): void
    {
        //DADO que tenho um endereco cadastrado no banco de dados
        $telefone = $this->telefone;

        //ENTAO o mesmo endereco nao deve ser encontrado
        $telefoneRemovido = Telefone::find($telefone->idTelefone);

        $this->assertNotEmpty($telefoneRemovido);
    }

    public function testRemoverEndereco(): void
    {
        //DADO que tenho um endereco cadastrado no banco de dados
        $telefone = $this->telefone;

        //QUANDO a funcao para remover é executada
        $telefone->delete();

        //ENTAO o mesmo endereco nao deve ser encontrado
        $telefoneRemovido = Telefone::find($telefone->idTelefone);

        $this->assertEmpty($telefoneRemovido);

    }
}
