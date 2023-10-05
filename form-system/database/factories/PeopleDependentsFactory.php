<?php

namespace Database\Factories;

use App\Models\PeopleDependents;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleDependentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PeopleDependents::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'birth' => $this->faker->date('Y-m-d', 'now - 120 years'),
        ];
    }
}
