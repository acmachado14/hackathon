<?php

namespace Tests\Functional;

use App\Models\Endereco;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnderecoTest extends TestCase
{
    use RefreshDatabase;

    private $enderecoData;
    private $endereco;

    public function setUp(): void
    {
        parent::setUp();

        $this->enderecoData = [
            'CEP' => '12345-678',
            'pais' => 'Brasil',
            'estado' => 'Sao Paulo',
            'cidade' => 'Sao Paulo',
            'bairro' => 'Centro',
            'tipoLogradouro' => 'Rua',
            'enderecoResidencial' => 'Avenida Paulista',
            'numeroResidencia' => '100',
            'complementoEndereco' => 'Apto 101',
        ];

        $this->endereco = Endereco::create($this->enderecoData);
    }

    public function testInserirEndereco(): void
    {
        //DADO que tenho os dados de um endereco
        $endereco = $this->enderecoData;

        //QUANDO realizo a funcao de cadastrar um endereco
        $endereco = Endereco::create($endereco);

        //ENTAO ele deve ser cadastrado
        $this->assertEquals($this->enderecoData['CEP'], $endereco->CEP);
        $this->assertEquals($this->enderecoData['pais'], $endereco->pais);
        $this->assertEquals($this->enderecoData['estado'], $endereco->estado);
        $this->assertEquals($this->enderecoData['cidade'], $endereco->cidade);
        $this->assertEquals($this->enderecoData['bairro'], $endereco->bairro);
        $this->assertEquals($this->enderecoData['tipoLogradouro'], $endereco->tipoLogradouro);
    }

    public function testEditarEnderecoExistente()
    {
        //DADO que tenho um endereco cadastrado no banco de dados
        $endereco = $this->endereco;

        //QUANDO a funcao para editar é executada
        $novoEstado = 'Rio de Janeiro';
        $endereco->estado = $novoEstado;
        $endereco->save();

        //ENTAO o estado deve ser atualizado
        $this->assertEquals($novoEstado, $endereco->estado);
    }

    public function testVisualizarEndereco()
    {
        //DADO que tenho um endereco cadastrado no banco de dados
        $endereco = $this->endereco;

        //QUANDO a funcao para visualizar é executada
        $endereco = Endereco::find($endereco->idEndereco);

        //ENTAO o endereco deve ser encontrado
        $this->assertNotNull($endereco);
    }

    public function testRemoverEndereco()
    {
        //DADO que tenho um endereco cadastrado no banco de dados
        $endereco = $this->endereco;

        //QUANDO a funcao para remover é executada
        $endereco->delete();

        //ENTAO o mesmo endereco nao deve ser encontrado
        $enderecoRemovido = Endereco::find($endereco->idEndereco);

        $this->assertEmpty($enderecoRemovido);

    }
}
