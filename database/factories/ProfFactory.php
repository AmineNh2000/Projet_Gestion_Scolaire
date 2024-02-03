<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;
    public function definition()
    {
        
        return [
            //
            'name' => $this->faker->name,
            'Prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('00000000'), // Hash the password using Hash::make
            'user_name' => $this->faker->userName,
            'Address' => $this->faker->phoneNumber,
            'phone_number' => $this->faker->phoneNumber,
            'RoleID'=>'prof',
            
        ];
    }
}
