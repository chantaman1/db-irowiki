<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
  protected $table = 'element';
    protected $offense;
    protected $defense;
    protected $level;
    protected $version;
    protected $modifier;


  protected $fillable=[
    'offense', 'defense', 'level', 'version', 'modifier'
  ];

  protected $casts = [
    'offense' => 'integer',
    'defense' => 'integer',
    'level' => 'integer',
    'version' => 'integer',
    'modifier' => 'integer'
  ];
}
