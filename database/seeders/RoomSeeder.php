<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $users;

    public function run()
    {
        $this->users = User::all()->pluck('id');

        foreach (range(0,300) as $i){
            $this->createRandomRooms();
        }

    }

    public function createRandomRooms()
    {
        Room::factory()->create([
            'user_id' => $this->users->random()
        ]);
    }

}
