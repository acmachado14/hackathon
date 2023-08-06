<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidato>
 */
class CandidatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nomeCandidato' => $this->faker->name,
            'nomeMae' => $this->faker->name,
            'nomePai' => $this->faker->name,
            'sexoCandidato' => $this->faker->randomElement(['Masculino', 'Feminino']),
            'estadoCivil' => $this->faker->randomElement(['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)']),
            'grauInstrucao' => $this->faker->randomElement(['Ensino Fundamental', 'Ensino Médio', 'Ensino Superior']),
            'racaCor' => $this->faker->randomElement(['Branco', 'Negro', 'Pardo', 'Indígena']),
            'dataNascimentoCandidato' => $this->faker->date,
            'nacionalidade' => $this->faker->country,
            'paisNascimento' => $this->faker->country,
            'estadoNascimento' => $this->faker->state,
            'cidadeNascimento' => $this->faker->city,
            'numeroBotina' => $this->faker->numberBetween(36, 45),
            'numeroCalca' => $this->faker->numberBetween(30, 50),
            'tamanhoCamisa' => $this->faker->randomElement(['P', 'M', 'G', 'GG']),
            'email' => $this->faker->unique()->safeEmail,
            'numIdentidade' => $this->faker->randomNumber,
            'orgaoEmissorIdentidade' => 'SSP',
            'estadoOrgaoEmissor' => $this->faker->stateAbbr,
            'cidadeEmissaoIdentidade' => $this->faker->city,
            'dataExpedicaoIdentidade' => $this->faker->date,
            'numCPF' => $this->faker->unique()->numerify('###########'),
            'numPisPasep' => $this->faker->unique()->numerify('###########'),
            'anexoIdentidade' => 'teste.png',
            'anexoCPF' => 'teste.png',
            'anexoCurriculo' => 'teste.png',
            'anexoCNH' => 'teste.png',
            'anexoCertificadoReservista' => 'teste.png',
            'status' => $this->faker->boolean(50),
            'idEndereco' => 1, // Defina aqui o valor padrão para idEndereco
            'idFuncao' => 1, // Defina aqui o valor padrão para idFuncao
        ];
    }
}
