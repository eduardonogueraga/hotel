<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,600) as $i){
            $this->createRandomUsers();
        }
    }

    public function createRandomUsers()
    {
        User::factory()->create();
    }
}
