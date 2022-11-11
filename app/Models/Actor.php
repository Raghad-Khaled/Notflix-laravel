<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'image'
    ];

    /**
     * Get the Movies that owns the actor.
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movies');
    }

    /**
     * Get the Series that owns the actor.
     */
    public function series()
    {
        return $this->belongsToMany(Serie::class, 'actor_series');
    }
}
