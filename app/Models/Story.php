<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author_name',
        'image',
        'overview'
    ];

    /**
     * Get the movies for the blog post.
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    /**
     * Get the movies for the blog post.
     */
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
