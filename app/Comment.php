<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'post_id'
    ];

    protected $table = 'comments';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(CommentLike::class)
            ->where('comment_like', '=', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unLikes()
    {
        return $this->hasMany(CommentLike::class)
            ->where('comment_unlike', '=', 1);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function commentOwnerList(int $id)
    {
        return self::where('user_id', $id)->get();
    }


}
