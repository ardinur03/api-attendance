<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$2AijEjqMC.QgP/eA7OgiZeHdb41OcsH2RU3n/PbMpAfHqOQMQF9VO', // 12345678
        ];
    }
}
