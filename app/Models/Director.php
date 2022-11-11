<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
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
     * Get the movies for the director.
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    /**
     * Get the series for the director.
     */
    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
