<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapMain extends Model
{
  protected $table = 'map_main';
  protected $id;
  protected $name;
  protected $subname;
  protected $category;
  protected $bgm;
  protected $world;
  protected $oldmap;
  protected $visible;
  protected $visible2;

  protected $fillable=[
    'id', 'name', 'subname', 'category', 'bgm', 'world', 'oldmap', 'visible', 'visible2'
  ];

  protected $casts = [
    'id' => 'string',
    'name' => 'string',
    'subname' => 'string',
    'category' => 'integer',
    'bgm' => 'integer',
    'world' => 'integer',
    'oldmap' => 'integer',
    'visible' => 'integer',
    'visible2' => 'integer'
  ];
}
