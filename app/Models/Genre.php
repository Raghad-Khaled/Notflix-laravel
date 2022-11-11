<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type'
    ];

    /**
     * Get the movies for the genre type.
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    /**
     * Get the series for the genretype.
     */
    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
