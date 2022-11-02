<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anuncio>
 */
class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->randomElement([
                'Caja de Zapatos',
                'Calendario de Adviento de Salud Natural',
                'Acite vegetal',
                'Fisiocrem Gel Active',
                'Serum Acido',
                'Acite de jojoba',
                'Champu arbol de te',
                'Jabon de manos de lavanda',
                'Duplo gel',
                'Gua-Sha',
                'Cepillo de dientes de bambu',
                'Jabón de alepo',
                'Crema de sal',
                'Dentrífico de fluor activo',
            ]),
            'descripcion' => $this->faker->sentence(8),
            'precio' => $this->faker->numberBetween(20, 300),
            'image' => $this->faker->numberBetween(1, 37).'.jpg',
            'visitas' => $this->faker->numberBetween(100, 1100),
            'user_id' => $this->faker->numberBetween(2,21),
            'categoria_id' => $this->faker->numberBetween(1,5),
            'vendido' => $this->faker->boolean(),

        ];
    }
}
