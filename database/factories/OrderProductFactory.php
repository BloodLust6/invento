<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::pluck('id')->random(),
            'product_id' => Product::pluck('id')->random(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->numberBetween(1000, 5000),
            'sale_price' => $this->faker->numberBetween(5000, 9999),
        ];
    }
}
