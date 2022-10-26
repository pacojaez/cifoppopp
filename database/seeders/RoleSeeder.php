<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory()->create([
            'role' => 'ADMINISTRADOR',
            'descripcion' => 'Superpoderes'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'EDITOR',
            'descripcion' => 'Casi Superpoderes'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'VERIFICADO',
            'descripcion' => 'Alguna pocas atribuciones'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'IDENTIFICADO',
            'descripcion' => 'Casi Ninguna opción de gestion'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'INVITADO',
            'descripcion' => 'Capaz de casi todo'
        ]);
    }
}
