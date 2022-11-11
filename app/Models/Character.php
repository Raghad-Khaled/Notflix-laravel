<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gender',
        'story_id',
        'overview',
        'image'
    ];

    /**
     * Get the story that owns the character.
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
