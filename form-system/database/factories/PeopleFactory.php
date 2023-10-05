<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'birth' => $this->faker->date('Y-m-d', 'now - 120 years'),
            'photo' => 'https://picsum.photos/200/300?v=' . $this->faker->unique()->numberBetween(1, 1000)
        ];
    }
}
