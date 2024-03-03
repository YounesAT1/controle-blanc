<?php

namespace Database\Factories;

use App\Models\Offre;
use App\Models\Entreprise;
use App\Models\Specialite;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->jobTitle,
            'salaire' => $this->faker->numberBetween(30000, 80000),
            'idE' => function () {
                return Entreprise::factory()->create()->idE;
            },
            'idSpe' => function () {
                return Specialite::factory()->create()->idSpe;
            },
        ];
    }
}
