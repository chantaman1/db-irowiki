<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $table = 'news';
    protected $id;
    protected $topic;
    protected $message;
    protected $date;
    protected $version;


  protected $fillable=[
    'id', 'topic', 'message', 'date', 'version'
  ];

  protected $casts = [
    'id' => 'integer',
    'topic' => 'string',
    'message' => 'string',
    'date' => 'datetime',
    'version' => 'integer'
  ];
}

