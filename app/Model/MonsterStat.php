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
}

