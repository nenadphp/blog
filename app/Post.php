<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    /**
     * @var string $table
     */
    protected $table = 'posts';

    /**
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function posts()
    {
        return self::latest()->take(10)->get();
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
