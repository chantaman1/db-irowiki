<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemMisc extends Model
{
  protected $table = 'item_misc';
    protected $id;
    protected $server;
    protected $price;
    protected $binding;
    protected $version;
    protected $date;


  protected $fillable=[
    'id', 'server', 'price', 'binding', 'version', 'date'
  ];
}

