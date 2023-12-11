<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemWeapon extends Model
{
  protected $table = 'item_weapon';
  protected $id;
  protected $atk;
  protected $matk;
  protected $matk2;
  protected $element;
  protected $level;

  protected $fillable=[
    'id', 'atk', 'matk', 'matk2', 'element', 'level'
  ];

  protected $casts = [
    'id' => 'integer',
    'atk' => 'integer',
    'matk' => 'integer',
    'matk2' => 'integer',
    'element' => 'integer',
    'level' => 'integer'
  ];
}

