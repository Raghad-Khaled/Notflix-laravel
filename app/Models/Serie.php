<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        "year",
        "link",
        "language",
        "revenue",
        "budget",
        "duration",
        "imdb_rate",
        "imdb_rate_count",
        "director_id",
        "description",
        'image',
    ];

    /**
     * Get the Director that owns the serie.
     */
    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    /**
     * Get the Actors that owns the serie.
     */
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_series');
    }

    /**
     * Get the Actors that owns the serie.
     */
    public function Companies()
    {
        return $this->belongsToMany(Company::class, 'company_series');
    }

    /**
     * Get the GENRE that owns the serie.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_series');
    }

    /**
     * Get the Rates that owns the movie.
     */
    public function rates()
    {
        return $this->belongsToMany(User::class, 'rate_series');
    }
}
