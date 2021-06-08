<?php


namespace App\Filters;


class RoomFilter extends QueryFilter
{

    public function rules(): array
    {
       return [
           'owner' => 'exists:users,id',
           'price' => ''
       ];
    }

//    public function price($query, $price)
//    {
//        return $query->with('users', function ($query) use ($price){
//            $query->wherePivot('price', '>', 30);
//        });
//    }

    public function owner($query, $owner)
    {
        return  $query->whereHas('user', function ($query) use ($owner){
                return $query->where('id', $owner);
        });
    }
}
