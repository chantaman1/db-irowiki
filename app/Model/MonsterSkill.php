<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonsterSkill extends Model
{
  protected $table = 'monster_skill';
    protected $id;
    protected $version;
    protected $server;
    protected $state;
    protected $num;
    protected $skill;
    protected $level;
    protected $target;
    protected $chance;
    protected $cast;
    protected $delay;
    protected $interupt;
    protected $emote;
    protected $mode;
    protected $cond;
    protected $param;


  protected $fillable=[
    'id', 'version', 'server', 'state', 'num', 'skill', 'level', 'target', 'chance', 'cast', 'delay', 'interupt', 'emote', 'mode', 'cond', 'param'
  ];

  protected $casts = [
    'id' => 'integer',
    'version' => 'integer',
    'server' => 'integer',
    'state' => 'integer',
    'num' => 'integer',
    'skill' => 'integer',
    'level' => 'integer',
    'target' => 'integer',
    'chance' => 'integer',
    'cast' => 'integer',
    'delay' => 'integer',
    'interupt' => 'integer',
    'emote' => 'string',
    'mode' => 'integer',
    'cond' => 'integer',
    'param' => 'string'
  ];
}

