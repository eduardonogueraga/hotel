<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoomUser extends Pivot
{

    use HasFactory;
    protected $guarded = [];

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
