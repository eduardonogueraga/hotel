<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    //protected $dates = [];

    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(RoomUser::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithTV($query)
    {
        return  $query->where('has_tv', '>', '0');
    }

    public function scopeWithInternet($query)
    {
        return  $query->where('has_internet', true);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new RoomQuery($query);
    }


}
