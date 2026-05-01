<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    public function run(): void
    {
        Vote::factory()->count(10)->create();
    }
}
