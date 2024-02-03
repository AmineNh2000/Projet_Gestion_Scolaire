<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\departement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ];
        return [
            //
            'name' => $this->faker->name,
            'Prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('00000000'), // Hash the password using Hash::make
            'user_name' => $this->faker->userName,
            'Address' => implode(' ', $this->faker->words(3)),
            'date_naissance' => Carbon::create(
                rand(1999, 2004), // année
                rand(1, 12), // mois
                rand(1, 28) // jour
            ),
            'note_bac' => rand(13, 17),
            'note_diplome' => rand(14, 18),
            'Departement' => departement::inRandomOrder()->first(),
            'phone_number' => $this->faker->phoneNumber,
            'RoleID' => $this->faker->randomElement(['prof', 'etudiant']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
