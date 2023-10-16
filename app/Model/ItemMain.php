<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemMain extends Model
{
  protected $table = 'item_main';
    protected $id;
    protected $name;
    protected $category;
    protected $subcat;
    protected $description;
    protected $unident;
    protected $notes;
    protected $weight;
    protected $slots;
    protected $reqlv;
    protected $upgrade;
    protected $damage;
    protected $job;
    protected $buyable;
    protected $visible;
    protected $visible2;
    protected $visible4;
    protected $in_calc;

  protected $fillable=[
    'id', 'name', 'category', 'subcat', 'description', 'unident', 'notes', 'weight', 'slots', 'reqlv', 'upgrade', 'damage', 'job', 'buyable', 'visible', 'visible2', 'visible4', 'in_calc'
  ];
}

