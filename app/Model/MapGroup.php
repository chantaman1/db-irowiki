<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapGroup extends Model
{
  protected $table = 'map_group';
  protected $id;
  protected $grp;
  protected $name;
  protected $note;

  protected $fillable=[
    'id', 'grp', 'name', 'note'
  ];

  protected $casts = [
    'id' => 'string',
    'grp' => 'integer',
    'name' => 'string',
    'note' => 'integer'
  ];
}
