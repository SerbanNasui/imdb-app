<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = array(
            'Star',
            'Writer',
            'Manager'
        );
        
        return [
            
            'name' => $this->faker->name(),
            'title' => $titles[array_rand($titles)]
        ];
    }
}
