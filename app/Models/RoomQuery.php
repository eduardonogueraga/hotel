<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class RoomQuery extends QueryBuilder
{

    public function withReservationPrice()
    {
        $subselect = RoomUser::select('room_user.price')
            ->whereColumn('room_user.room_id', 'rooms.id')
            ->latest() // orderByDesc('created_at')
            ->limit(1);

        return $this->addSelect([
            'last_reservation_price' => $subselect,
        ]);
    }

    public function withCountReservations()
    {
        $subselect = DB::table('room_user AS ru')
            ->selectRaw('COUNT(ru.id)')
            ->whereColumn('ru.room_id', 'rooms.id');

        return $this->addSelect([
            'total_reservations' => $subselect,
        ]);
    }



}
