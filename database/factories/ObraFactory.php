<?php

namespace Database\Factories;

use App\Models\Obra;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Obra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "street_name" => $this->faker->streetName,
            "postal_code" =>  $this->faker->postcode,
            "number" =>  $this->faker->numberBetween(1,50),
            "floor" =>  $this->faker->numberBetween(0,13),
            "door" =>  $this->faker->randomElement(["I","D","C","A","B","D"]),
            "building_type" => $this->faker->randomElement(["1","2","3","4","5"]),
            "construction_type" => $this->faker->randomElement(["1","2","3"]),
            "city" =>  $this->faker->city,
            "province" => $this->faker->citySuffix,
            "description" => $this->faker->text,
            "latitude" => $this->faker->latitude($min = 42.821155, $max = 42.880222),
            "longitude" => $this->faker->longitude($min = -2.764693, $max =  -2.627954),
        ];
    }
}
