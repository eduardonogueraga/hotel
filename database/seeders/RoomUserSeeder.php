<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $users;

    public function run()
    {
        $this->users = User::inRandomOrder()->take(200)->get();

        $this->createRandomReservation();


    }

    public function createRandomReservation()
    {
        foreach ($this->users as $user){
            $rooms = Room::inRandomOrder()->take(rand(1,3))->pluck('id');

            foreach ($rooms as $room){
               // dd('llego');
                $user->rooms()->attach($room, [
                    'start_date' => now()->subDays(rand(1,30)),
                    'end_date' => now()->addDays(rand(1,30)),
                    'price' => rand(10,50),
                    'total' => 100, //defecto
                ]);
            }
        }
    }

}
