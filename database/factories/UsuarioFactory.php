<?php

namespace Database\Factories;

use App\Models\{Usuario,Perfil};
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $perfil=Perfil::all('id');//Traemos los perfiles
        return [
            'nomusu'=>ucfirst($this->faker->unique()->userName()),
            'mail'=>$this->faker->unique()->freeEmail(),
            'localidad'=>$this->faker->streetAddress(),
            'perfil_id'=>$perfil->get(rand(0,count($perfil)-1)),
        ];
    }
}
