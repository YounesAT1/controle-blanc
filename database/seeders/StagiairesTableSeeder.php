<?php

namespace Database\Seeders;

use App\Models\Stagiaire;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StagiairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stagiaire::factory()->count(10)->create();
    }
}
