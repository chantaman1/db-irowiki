<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemAdjective extends Model
{
  protected $table = 'item_adjective';
  protected $id;
  protected $adjective;

  protected $fillable=[
    'id', 'ajective'
  ];

  protected $casts = [
    'id' => 'integer',
    'ajective' => 'string'
  ];
}

