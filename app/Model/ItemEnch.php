<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemEnch extends Model
{
  protected $table = 'item_ench';
    protected $id;
    protected $server;
    protected $type;


  protected $fillable=[
    'id', 'server', 'type'
  ];

  protected $casts = [
    'id' => 'integer',
    'server' => 'integer',
    'type' => 'integer'
  ];
}

