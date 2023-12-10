<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonsterStat extends Model
{
  protected $table = 'monster_stat';
  protected $id;
  protected $version;
  protected $server;
  protected $level;
  protected $hp;
  protected $size;
  protected $race;
  protected $eleType;
  protected $eleLvl;
  protected $expBase;
  protected $expJob;
  protected $def;
  protected $mdef;
  protected $atkMin;
  protected $atkMax;
  protected $atkRange;
  protected $aspd;
  protected $mspeed;
  protected $statAgi;
  protected $statVit;
  protected $statInt;
  protected $statDex;
  protected $statLuk;
  protected $mode;
  protected $ai;

  protected $fillable=[
    'id', 'version', 'server', 'level', 'hp', 'size', 'race', 'eleType', 'eleLvl', 'expBase', 'expJob', 'def', 'mdef', 'atkMin', 'atkMax', 'atkRange', 'aspd', 'mspeed', 'statAgi', 'statVit', 'statInt', 'statDex', 'statLuk', 'mode', 'ai'
  ];

  protected $casts = [
    'id' => 'integer',
    'version' => 'integer',
    'server' => 'integer',
    'level' => 'integer',
    'hp' => 'integer',
    'size' => 'integer',
    'race' => 'integer',
    'eleType' => 'integer',
    'eleLvl' => 'integer',
    'expBase' => 'integer',
    'expJob' => 'integer',
    'def' => 'integer',
    'mdef' => 'integer',
    'atkMin' => 'integer',
    'atkMax' => 'integer',
    'atkRange' => 'integer',
    'aspd' => 'integer',
    'mspeed' => 'integer',
    'statAgi' => 'integer',
    'statVit' => 'integer',
    'statInt' => 'integer',
    'statDex' => 'integer',
    'statLuk' => 'integer',
    'mode' => 'integer',
    'ai' => 'integer'
  ];
}

