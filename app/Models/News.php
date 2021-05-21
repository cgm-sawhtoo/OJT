<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'message',
        'public_flag',
        'user_id',
    ];

    /**
     * connect to news
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
