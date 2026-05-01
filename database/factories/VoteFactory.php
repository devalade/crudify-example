<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vote;


class VoteFactory extends Factory
{
    protected $model = Vote::class;

    public function definition(): array
    {
        return [
            'titre' => fake()->word(),
            'nombre_de_vote' => fake()->randomNumber(),
            'photo' => fake()->word().'.jpg',
        ];
    }


}
