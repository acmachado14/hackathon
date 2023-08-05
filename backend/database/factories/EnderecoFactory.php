<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'CEP' => $this->faker->postcode,
            'pais' => $this->faker->country,
            'estado' => $this->faker->country,
            'cidade' => $this->faker->city,
            'bairro' => $this->faker->word,
            'tipoLogradouro' => $this->faker->randomElement(['Rua', 'Avenida', 'Travessa']),
            'enderecoResidencial' => $this->faker->streetName,
            'numeroResidencia' => $this->faker->buildingNumber,
            'complementoEndereco' => $this->faker->optional()->sentence,
        ];
    }
}
