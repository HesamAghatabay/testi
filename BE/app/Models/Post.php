<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "title",
        'body',
        'time',
        'status',
        'user_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
