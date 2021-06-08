<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class RoomsController extends Controller
{

    public function index()
    {
        $rooms = Room::query()
            ->with('users', 'user')
            ->whereHas('users', function ($query){
                $query->where('price', '=', 50);
            })
            ->withTV()
            ->withReservationPrice()
            ->withCountReservations()
            ->applyFilters()
            ->orderBy('created_at', 'ASC')
            ->when(request('internet'), function ($query, $var) {
                if ($var == 'true') {
                    $query->withInternet();
                }
            })
            ->paginate();

        return view('rooms.index', [
            'rooms' => $rooms,
            'owners' => User::query()
                    ->with('room')
                    ->whereHas('room', function ($query){
                        return $query->where('has_tv', '>', '0');
                    })
                    ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Room $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
