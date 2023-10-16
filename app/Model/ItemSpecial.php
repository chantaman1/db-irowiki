<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemSpecial extends Model
{
  protected $table = 'item_special';
    protected $index;
    protected $type;
    protected $id;
    protected $version;
    protected $server;
    protected $stat;
    protected $grp;
    protected $num;
    protected $special;

  protected $fillable=[
    'index', 'type', 'id', 'version', 'server', 'stat', 'grp', 'num', 'special'
  ];
}

