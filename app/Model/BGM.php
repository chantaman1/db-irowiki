<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BGM extends Model
{
    protected $table = 'bgm';
    protected $track;
    protected $title;
    
    protected $fillable=[
        'track', 'title'
    ];

    protected $casts = [
        'track' => 'integer',
        'title' => 'string'
    ];
}
