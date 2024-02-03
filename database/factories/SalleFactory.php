<?php

namespace Database\Factories;

use App\Models\Salle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */
class SalleFactory extends Factory
{
    private static $index = 1; // Declare a static variable to persist the index state

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Salle::class;
    public function definition()
    {
        $index = self::$index;
        self::$index++; // Increment the index for the next record
        // Generate a sentence with three words
        $description = implode(' ', $this->faker->words(3));
        return [
            'nom' => "salle $index",
            'capacite' => $this->faker->numberBetween(25, 60),// Assuming you want a 3-digit number
            'description' => $description,
            'disponibilite' => $this->faker->randomElement(['libre', 'occupée']),
            // Add other attributes as needed
            
        ];
 
    }
}
