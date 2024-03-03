<?php

namespace Database\Seeders;

use App\Models\Postuler;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostulersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Postuler::factory()->count(10)->create();

    }
}
