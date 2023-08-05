<?php

namespace Tests\Functional;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Funcao;
use App\Models\Telefone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CandidatoTest extends TestCase
{
    use RefreshDatabase;

    private $candidatoData;
    private $candidato;

    public function setUp(): void
    {
        parent::setUp();

        $endereco = Endereco::factory()->create();
        $funcao = Funcao::factory()->create();

        $this->candidatoData = [
            'nomeCandidato' => 'John Doe',
            'nomeMae' => 'Jane Doe',
            'nomePai' => 'John Smith',
            'sexoCandidato' => 'Masculino',
            'estadoCivil' => 'Solteiro',
            'grauInstrucao' => 'Superior Completo',
            'racaCor' => 'Branco',
            'dataNascimentoCandidato' => '1990-05-15',
            'nacionalidade' => 'Brasileira',
            'paisNascimento' => 'Brasil',
            'estadoNascimento' => 'Sao Paulo',
            'cidadeNascimento' => 'Sao Paulo',
            'numeroBotina' => 42,
            'numeroCalca' => 32,
            'tamanhoCamisa' => 'M',
            'email' => 'john.doe@example.com',
            'numIdentidade' => 1234567890,
            'orgaoEmissorIdentidade' => 'SSP',
            'estadoOrgaoEmissor' => 'Sao Paulo',
            'cidadeEmissaoIdentidade' => 'Sao Paulo',
            'dataExpedicaoIdentidade' => '2010-01-01',
            'numCPF' => 12345678901,
            'numPisPasep' => 98765432101234,
            'anexoIdentidade' => 'anexo_identidade.pdf',
            'anexoCPF' => 'anexo_cpf.pdf',
            'anexoCurriculo' => 'anexo_curriculo.pdf',
            'anexoCNH' => 'anexo_cnh.pdf',
            'anexoCertificadoReservista' => 'anexo_reservista.pdf',
            'status' => 'Aprovado',
            'idEndereco' => $endereco->idEndereco,
            'idFuncao' => $funcao->idFuncao,
        ];

        $this->candidato = Candidato::create($this->candidatoData);
    }

    public function testInserirCandidato(): void
    {
        // DADO que tenho os dados de um candidato
        $candidatoData = $this->candidatoData;

        // QUANDO realizo a função de cadastrar um candidato
        $candidato = Candidato::create($candidatoData);

        // ENTAO ele deve ser cadastrado
        $this->assertEquals($candidatoData['nomeCandidato'], $candidato->nomeCandidato);
        $this->assertEquals($candidatoData['nomeMae'], $candidato->nomeMae);
        $this->assertEquals($candidatoData['nomePai'], $candidato->nomePai);
        $this->assertEquals($candidatoData['sexoCandidato'], $candidato->sexoCandidato);
        $this->assertEquals($candidatoData['estadoCivil'], $candidato->estadoCivil);
        $this->assertEquals($candidatoData['grauInstrucao'], $candidato->grauInstrucao);
        $this->assertEquals($candidatoData['racaCor'], $candidato->racaCor);
        $this->assertEquals($candidatoData['dataNascimentoCandidato'], $candidato->dataNascimentoCandidato);
        $this->assertEquals($candidatoData['nacionalidade'], $candidato->nacionalidade);
        $this->assertEquals($candidatoData['paisNascimento'], $candidato->paisNascimento);
        $this->assertEquals($candidatoData['estadoNascimento'], $candidato->estadoNascimento);
        $this->assertEquals($candidatoData['cidadeNascimento'], $candidato->cidadeNascimento);
        $this->assertEquals($candidatoData['numeroBotina'], $candidato->numeroBotina);
        $this->assertEquals($candidatoData['numeroCalca'], $candidato->numeroCalca);
        $this->assertEquals($candidatoData['tamanhoCamisa'], $candidato->tamanhoCamisa);
        $this->assertEquals($candidatoData['email'], $candidato->email);
        $this->assertEquals($candidatoData['numIdentidade'], $candidato->numIdentidade);
        $this->assertEquals($candidatoData['orgaoEmissorIdentidade'], $candidato->orgaoEmissorIdentidade);
        $this->assertEquals($candidatoData['estadoOrgaoEmissor'], $candidato->estadoOrgaoEmissor);
        $this->assertEquals($candidatoData['cidadeEmissaoIdentidade'], $candidato->cidadeEmissaoIdentidade);
        $this->assertEquals($candidatoData['dataExpedicaoIdentidade'], $candidato->dataExpedicaoIdentidade);
        $this->assertEquals($candidatoData['numCPF'], $candidato->numCPF);
        $this->assertEquals($candidatoData['numPisPasep'], $candidato->numPisPasep);
        $this->assertEquals($candidatoData['anexoIdentidade'], $candidato->anexoIdentidade);
        $this->assertEquals($candidatoData['anexoCPF'], $candidato->anexoCPF);
        $this->assertEquals($candidatoData['anexoCurriculo'], $candidato->anexoCurriculo);
        $this->assertEquals($candidatoData['anexoCNH'], $candidato->anexoCNH);
        $this->assertEquals($candidatoData['anexoCertificadoReservista'], $candidato->anexoCertificadoReservista);
        $this->assertEquals($candidatoData['status'], $candidato->status);
        $this->assertEquals($candidatoData['idEndereco'], $candidato->idEndereco);
        $this->assertEquals($candidatoData['idFuncao'], $candidato->idFuncao);
    }
}
