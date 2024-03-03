<?php

namespace Database\Factories;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class StagiaireFactory extends Factory
{
    protected $model = Stagiaire::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'cv' => $this->faker->url,
        ];
    }
}
