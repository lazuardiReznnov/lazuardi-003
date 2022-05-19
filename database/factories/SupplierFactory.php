<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company(),
            'slug'=>$this->faker->slug(),
            'telp'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->safeEmail(),
            'address'=>$this->faker->address ()
        ];
    }
}
