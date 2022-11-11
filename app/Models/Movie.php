<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
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
        "story_id",
        "description",
        'image',
    ];

    /**
     * Get the story that owns the movie.
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    /**
     * Get the Director that owns the movie.
     */
    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    /**
     * Get the Actors that owns the movie.
     */
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movies');
    }

    /**
     * Get the Actors that owns the movie.
     */
    public function Companies()
    {
        return $this->belongsToMany(Company::class, 'company_movies');
    }

    /**
     * Get the GENRE that owns the movie.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movies');
    }

    /**
     * Get the favouate movies for the user.
     */
    public function rates()
    {
        return $this->belongsToMany(User::class, 'rate_movie');
    }


}
