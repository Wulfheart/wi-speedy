<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Speedtest;

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
            'tested_at' => now()->subHours($this->faker->numberBetween(0, 200)),
            'download' => $this->faker->randomFloat(10, 0, 150000.0000000000),
            'upload' => $this->faker->randomFloat(10, 0, 50000.0000000000),
            'ping' => $this->faker->randomFloat(10, 0, 300.0000000000),
            'result' => '{}',
        ];
    }
}
