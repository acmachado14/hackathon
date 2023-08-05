<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcao>
 */
class FuncaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigoFuncao' => $this->faker->unique()->randomNumber(4),
            'descricao' => $this->faker->sentence,
            'cbo' => $this->faker->randomNumber(3),
        ];
    }
}
