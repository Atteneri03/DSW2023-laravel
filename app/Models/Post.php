<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'body',
        'published_at',
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The votedUsers that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'votes');
    }

}
