<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement([
                'Cajas',
                'Zapatos',
                'Calendarios',
                'Aceites',
                'Geles',
                'Serums',
                'Champus',
                'Jabones',
                'Cepillos',
                'Crema',
                'Dentríficos',
                'Velas',
                'Productos de la Huerta',
                'Producto Fresco',
                'Manufacturado'
            ]),
            'descripcion' => $this->faker->sentence(8),
            'imagen' => 'anuncio'.$this->faker->numberBetween(1, 37).'.jpg',
        ];
    }
}
