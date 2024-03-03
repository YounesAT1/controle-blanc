<?php

namespace Database\Seeders;

use App\Models\Offre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OffresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offre::factory()->count(10)->create();

    }
}
