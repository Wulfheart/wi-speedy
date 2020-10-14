<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Speedtest;

class SpeedtestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Speedtest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tested_at' => now()->subSeconds($this->faker->numberBetween(0,604800)),
            'upload' => $this->faker->randomFloat(10, 0, 50000000),
            'download' => $this->faker->randomFloat(10, 0, 250000000),
            'ping' => $this->faker->randomFloat(10, 0, 3),
            'result' => '{}',
            'duration' => $this->faker->randomFloat(10, 10, 30),
        ];
    }
}
