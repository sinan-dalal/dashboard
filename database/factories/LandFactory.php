<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Land>
 */
class LandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => rand(10000,999999),
            'desired_price' => rand(10000,999999),
            'area' => rand(10000,999999),
            'width' => rand(10000,999999),
            'length' => rand(10000,999999),
            'tract_no' => rand(10000,999999),
            'nature' =>$this->faker->name. "ممتازة",
            'address' =>$this->faker->name. "القدس جانب الحرم الابراهيمي",
            'description' => $this->faker->name."للستثمار العاجل",
            'landscape_id' => rand(1,2),
            'direction_id' => rand(1,2),
            'site_description_id' => rand(1,2),
            'office_id' => 1
        ];
    }
}
