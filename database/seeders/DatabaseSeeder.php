<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Anuncio;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Anuncio::factory(200)->create();

        \App\Models\Categoria::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'apellidos' => 'Super Admin',
            'email' => 'admin@cifoppopp.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'poblacion' => 'Terrassa',
            'provincia' => 'Barcelona',
            'cp' => '08226',
            'fechanacimiento' => '2000-03-25',
            'telefono' => '606566636'
            ]);

            $this->call([
                RoleSeeder::class,
            ]);

        \App\Models\User::factory(20)->create();

            $users = User::all();
            $roles = Role::all();
            foreach( $users as $user){
                if( $user->id === 1){
                    $user->roles()->attach(1);
                    continue;
                }

                foreach($roles as $role){
                    if( $role->id === 1)
                        continue;
                    if( rand(1,100) > 80)
                        $user->roles()->attach($role->id);
                }
            }

            \App\Models\Oferta::factory(1000)->create();
    }
}
