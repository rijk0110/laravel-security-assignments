<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'status' => $this->faker->boolean(),
            'order_deadline' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
