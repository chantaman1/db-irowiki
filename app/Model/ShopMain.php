<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopMain extends Model
{
  protected $table = 'shop_main';
    protected $id;
    protected $name;
    protected $map;
    protected $coorX;
    protected $coorY;
    protected $indoor;
    protected $version;


  protected $fillable=[
    'id', 'name', 'map', 'coorX', 'coorY', 'indoor', 'version'
  ];

  protected $casts = [
    'id' => 'string',
    'name' => 'string',
    'map' => 'string',
    'coorX' => 'integer',
    'coorY' => 'integer',
    'indoor' => 'integer',
    'version' => 'integer'
  ];
}
