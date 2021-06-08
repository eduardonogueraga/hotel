<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListsRoomTest extends TestCase
{
    use RefreshDatabase;

  /** @test */
    function it_filter_rooms_by_owner()
    {
        $client = User::factory()->create();
        $owner = User::factory()->create();

        //$this->get(route('rooms.index', ['owner' => ]))

    }
}
