<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    protected $fillable = [
        'user_id',
        'comment_id',
        'comment_like',
        'comment_unlike'
    ];

    protected $table = 'comment_likes';
}
