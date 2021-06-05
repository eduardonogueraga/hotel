<?php

namespace Database\Factories;

use App\Models\RoomUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomUserFactory extends Factory
{
    protected $model = RoomUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'start_date' => now()->subDays(rand(1,30)),
            'end_date' => now()->addDays(rand(1,30)),
            'price' => $this->faker->randomFloat(2, 10, 100),
             'total' => 100, //defecto
        ];
    }
}
