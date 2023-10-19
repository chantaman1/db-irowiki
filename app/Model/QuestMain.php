<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestMain extends Model
{
  protected $table = 'quest_main';
    protected $id;
    protected $name;
    protected $category;
    protected $subcat;
    protected $server;
    protected $wiki;


  protected $fillable=[
    'id', 'name', 'category', 'subcat', 'server', 'wiki'
  ];

  protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'category' => 'integer',
    'subcat' => 'integer',
    'server' => 'integer',
    'wiki' => 'string',
  ];
}
