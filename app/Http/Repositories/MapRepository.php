<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use App\Http\Helpers\MapHelpers;

use App\Model\Category;
use App\Model\MapMain;
use App\Model\ShopMain;
use App\Model\BGM;
use App\Model\MapSpawn;
use App\Model\MapGroup;

class MapRepository
{
    protected $serverType = 1;

    public function getMenuCategory(int|null $id = null)
    {
        if ($id !== null)
            return Category::select('name', 'category')
                ->where('type', '=', 'map')
                ->where('category', '=', $id)
                ->where(function ($query) {
                    $query->where('version', '=', 0)
                        ->orWhere('version', '=', 2);
                })
                ->orderBy('category', 'asc')
                ->get();

        return Category::select('name', 'category')
            ->where('type', '=', 'map')
            ->where(function ($query) {
                $query->where('version', '=', 0)
                    ->orWhere('version', '=', 2);
            })
            ->orderBy('category', 'asc')
            ->get();
    }

    public function getMenuData(int|null $id = null)
    {
        if ($id !== null)
            return MapMain::select(
                    'id', 
                    'name', 
                    'category', 
                    'visible2'
                )
                ->where('id', '=', $id)    
                ->orderBy('id', 'asc')
                ->get();
        
        return MapMain::select(
                'id', 
                'name', 
                'category', 
                'visible2'
            )
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getShopMainList(string $mapID)
    {
        return ShopMain::select('id', 'name')
            ->where('map', '=', $mapID)
            ->where('version', '<', 3)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function getMapMainByID(string $mapID)
    {
        $serverCon = "server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);

        return MapMain::select(
                'map_main.id',
                'name', 
                'subName', 
                'category', 
                'bgm', 
                'map_flag.flag'
            )
            ->leftJoin('map_flag', 'map_flag.id', '=', 'map_main.id')
            ->where('map_main.id', '=', $mapID)
            ->whereRaw($serverCon)
            ->orderBy('name', 'asc')
            ->first();
    }

    public function getMapBGM(int $bgm)
    {   
        return BGM::select('title', 'track')
            ->where('track', '=', $bgm)
            ->first();
    }

    public function getMapType(int $category)
    {
        return Category::select('name')
            ->where('type', '=', 'map')
            ->where('category', '=', $category)
            ->first();
    }

    public function getSpawnListGroupList(string $mapID)
    {
        return MapGroup::select('grp', 'name', 'note')
            ->whereRaw('map_group.id=' . "'" . $mapID . "'")
            ->get();
    }

    public function getSpawnList(string $mapID, string $grpCon)
    {
        $serverCon = "`server`&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        
        return MapSpawn::select(
                'monster_main.id',
                DB::raw(
                    'IF(
                        map_spawn.name IS NOT NULL,
                        map_spawn.name,
                        monster_main.name 
                    ) AS name2'
                ),
                'hp',
                'level',
                'size',
                'race',
                'eleType',
                'eleLvl',
                'expBase',
                'expJob',
                'def',
                'mdef',
                'statAgi',
                'statVit',
                'statInt',
                'statDex',
                'statLuk',
                'mode',
                'ai',
                'amount',
                'time',
                'flag'
            )
            ->leftJoin(
                'monster_main', 
                'monster_main.id', 
                '=', 
                'map_spawn.monster'
            )
            ->leftJoin(
                'monster_stat',
                'monster_main.id',
                '=',
                'monster_stat.id'
            )
            ->whereRaw('map_spawn.id=' . "'" . $mapID . "'")
            ->whereRaw($grpCon)
            ->where(function ($query) {
                $query->where('map_spawn.version', '=', 0)
                ->orWhere('map_spawn.version', '=', 2);
            })
            ->whereRaw('`map_spawn`.' . $serverCon)
            ->where('monster_stat.version', '=', 2)
            ->whereRaw('`monster_stat`.' . $serverCon)
            ->groupBy('monster')
            ->orderBy('level', 'asc')
            ->orderBy('name2', 'asc')
            ->orderBy('time', 'asc')
            ->get();
    }

    public function getSpawnCount(string $mapID, string $grpID, int $monsterID)
    {
        $serverCon = "server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);

        return MapSpawn::select('id')
            ->where('id', '=', $mapID)
            ->where('monster', '=', $monsterID)
            ->where('grp', '=', $grpID)
            ->where(function ($query) {
                $query->where('map_spawn.version', '=', 0)
                    ->orWhere('map_spawn.version', '=', 2);
            })
            ->whereRaw($serverCon)
            ->count();
    }       

    public function getExtraSpawnList(string $mapID, string $grpID, int $monsterID, int $time)
    {
        $serverCon = "server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        return MapSpawn::select('amount', 'time', 'flag')
            ->where('id', $mapID)
            ->where('monster', $monsterID)
            ->where('grp', $grpID)
            ->where(function($query){
                $query->where('version', '=', 0)
                    ->orWhere('version', '=', 2);
            })
            ->whereRaw($serverCon)
            ->where(function($query) use ($time){
                if($time == null)
                    $query->whereNotNull('time');
                else
                    $query->where('time', '!=', $time);
            })
            ->get();
    }

    public function getWorld1Data()
    {
        // world & 1 = 1, you're checking if the first flag is on. This will be true when world is 1 or 3.
        
        return MapMain::select('id', 'name', 'subname')
            ->whereRaw('world&1=1 AND visible2=1')
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getWorld2Data()
    {
        // world & 2 = 2, you're checking if the second flag is on. This will be true when world is 2 or 3.

        return MapMain::select('id', 'name', 'subname')
            ->whereRaw('world&2=2 AND visible2=1')
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getWorldSpawnData(string $mapID)
    {
        $serverCon = "(version=0 OR version=2) AND server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);

        return MapSpawn::select(
                DB::raw('
                    IF(
                        map_spawn.name IS NOT NULL,
                        map_spawn.name,
                        monster_main.name
                    ) AS name2
                '),
                DB::raw('SUM(map_spawn.amount) AS amount'),
                'flag',
                DB::raw('
                    IF(
                        monster_main.category=3,
                        1,
                        monster_main.category
                    ) AS category2
                ')
            )
            ->leftJoin(
                'monster_main',
                'monster_main.id',
                '=',
                'map_spawn.monster'
            )
            ->whereRaw('map_spawn.id=' . "'" . $mapID . "'")
            ->whereRaw($serverCon)
            ->groupBy('map_spawn.monster')
            ->orderBy('category2', 'asc')
            ->orderBy('name2', 'asc')
            ->get();
    }
}