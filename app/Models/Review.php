<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //protected $dates = [];

    use HasFactory;
    protected $guarded = [];

    public function roomuser()
    {
        return $this->hasOne(RoomUser::class);
    }

}
