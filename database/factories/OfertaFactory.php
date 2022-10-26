<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Oferta>
 */
class OfertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'texto' => $this->faker->word(2),
            'vigencia' => $this->faker->date(),
            'importe' => $this->faker->numberBetween(10, 200),
            'user_id' => $this->faker->numberBetween(2, 21),
            'anuncio_id' => $this->faker->numberBetween(1, 200)
        ];
    }
}

