<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkillMain extends Model
{
  protected $table = 'skill_main';
  protected $id;
  protected $id2;
  protected $name;
  protected $targetType;

  protected $fillable=[
    'id', 'id2', 'name', 'targetType'
  ];

  protected $casts = [
    'id' => 'integer',
    'id2' => 'string',
    'name' => 'string',
    'targetType' => 'integer'
  ];
}