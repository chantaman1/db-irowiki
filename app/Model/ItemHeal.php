<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemHeal extends Model
{
  protected $table = 'item_heal';
    protected $id;
    protected $hpMin;
    protected $hpMax;
    protected $spMin;
    protected $spMax;



  protected $fillable=[
    'id', 'hpMin', 'hpMax', 'spMin', 'spMax'
  ];
}

