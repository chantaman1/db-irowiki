<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemGear extends Model
{
  protected $table = 'item_gear';
    protected $id;
    protected $def;
    protected $def2;
    protected $mdef;
    protected $mdef2;
    protected $position;



  protected $fillable=[
    'id', 'def', 'def2', 'mdef', 'mdef2', 'position'
  ];
}

