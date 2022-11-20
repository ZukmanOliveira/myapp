<?php

namespace Database\Factories;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence;
        return [
            'name' =>$name,
            'slug' =>Str::slug($name),
            'cover'=>$this->faker->imageUrl,
            'price'=>$this->faker->randomFloat(nbMaxDecimals:1, min:20, max:30),
            'description'=>$this->faker->sentence,
            'stock'=>$this->faker->randomDigit(),
        ];
    }
}
