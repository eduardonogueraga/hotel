<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //protected $dates = [];

    use HasFactory;
    protected $guarded = ['password'];

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }

}
