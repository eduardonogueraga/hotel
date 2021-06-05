<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'home_type' => $this->getHomes(),
            'room_type' =>  $this->getRooms(),
            'total_occupancy' => rand(1,3),
            'total_bedrooms' => rand(1,4),
            'total_bathrooms' => rand(1,2),
            'summary' => $this->faker->paragraph(2),
            'address' => $this->faker->address,
            'has_tv' => rand(0,1),
            'has_kitchen' => rand(0,1),
            'has_air_con' => rand(0,1),
            'has_heating' => rand(0,1),
            'has_internet' => rand(0,1),
            'price' => $this->faker->randomFloat(2, 50, 2000),
            'published_at' => now()->addDays(rand(0,30)),

        ];
    }

    public function getHomes()
    {
        $homes = [
            'Casa grande',
            'Casa media',
            'Casa pequeña',
            'Atico',
            'Piso',
            'Bajo',
        ];

        return $homes[rand(0, count($homes)-1)];

    }

    public function getRooms()
    {
        $rooms = [
            'Habitacion grande',
            'Habitacion media',
            'Habitacion pequeña',
        ];

        return $rooms[rand(0, count($rooms)-1)];
    }

}
