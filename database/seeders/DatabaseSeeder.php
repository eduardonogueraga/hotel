<?php

namespace Database\Seeders;

use App\Models\RoomUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables(['reviews', 'rooms', 'room_user','users']);

        $this->call(UserSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(RoomUserSeeder::class);
        $this->call(ReviewSeeder::class);
    }

    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
