<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'surname' => $this->faker->lastname,
            'email' => $this->faker->unique()->safeEmail,
            'dni' => $this->faker->unique()->dni,
            'phone' => $this->faker->tollFreeNumber,
            "birthdate" => $this->faker->date,
            "place_of_birth" =>  $this->faker->city,
            "postal_code" =>  $this->faker->postcode,
            "street_name" =>  $this->faker->streetName,
            "number" =>  $this->faker->numberBetween(1,50),
            "floor" =>  $this->faker->numberBetween(0,13),
            "door" =>  $this->faker->randomElement(["I","D","C","A","B","D"]),
            "city" =>  $this->faker->city,
            "province" => $this->faker->citySuffix,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}