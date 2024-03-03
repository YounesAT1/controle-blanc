<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialite;

class SpecialitesTableSeeder extends Seeder
{
    public function run()
    {
        // Create 5 fake records using the SpecialiteFactory
        Specialite::factory()->count(5)->create();
    }
}
