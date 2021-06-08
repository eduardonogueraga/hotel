<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //protected $dates = [];

    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new UserQuery($query);
    }

}
