<?php

namespace Database\Factories;

use App\Models\Asignaturas;
use App\Models\Profesores;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignaturas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $profesore=Profesores::all('id');
        return [
            'nombre' => $this->faker->randomElement(['JavaScript','Php','Desarrollo de aplicaciones web']),
            'descripcion' => $this->faker->text,
            'creditos' => $this->faker->randomDigitNot(0),
            'profesor_id'=>$profesore->get(rand(0,count($profesore)-1))
        ];
    }
}
