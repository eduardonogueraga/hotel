<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\RoomUser;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addReviewToReservation();
    }

    public function addReviewToReservation()
    {
        $reservations = RoomUser::all();
        foreach ($reservations as $reservation){
          Review::factory()->create([
                'room_user_id' => $reservation->id
            ]);

        }
    }
}
