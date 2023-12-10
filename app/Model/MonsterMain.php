<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonsterMain extends Model
{
  protected $table = 'monster_main';
  protected $id;
  protected $name;
  protected $category;
  protected $note;
  protected $visible;
  protected $visible2;
  protected $visible4;
  protected $date;

  protected $fillable=[
    'id', 'name', 'category', 'note', 'visible', 'visible2', 'visible4', 'date'
  ];

  protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'category' => 'integer',
    'note' => 'integer',
    'visible' => 'integer',
    'visible2' => 'integer',
    'visible4' => 'integer',
    'date' => 'datetime'
  ];
}
