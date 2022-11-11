<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorPrizeMovie extends Model
{
    use HasFactory;

    
     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        "movie_id",
        "actor_id",
        "prize_id",
        "year"
    ];
}
