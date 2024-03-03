<?php

namespace Database\Factories;

use App\Models\Offre;
use App\Models\Postuler;
use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulerFactory extends Factory
{
    protected $model = Postuler::class;

    public function definition()
    {
        return [
            'etat' => $this->faker->randomElement([ 'accepter', 'refuser']),
            'idSt' => function () {
                return Stagiaire::factory()->create()->idSt;
            },
            'idO' => function () {
                return Offre::factory()->create()->idO;
            },
        ];
    }
}
