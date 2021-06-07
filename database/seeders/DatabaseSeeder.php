<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\Perfil::factory(50)->create();//Importante que vaya antes
        \App\Models\Usuario::factory(15)->create();//Para que usuarios no de null en el perfil_id
    }
}
