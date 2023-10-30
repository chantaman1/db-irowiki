<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use App\Http\Helpers\MapHelpers;

use App\Model\Category;
use App\Model\MapMain;
use App\Model\ShopMain;
use App\Model\BGM;

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
            ->whereRaw(DB::raw($serverCon))
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
            ->where('id', '=', $mapID)
            ->first();
    }

    public function getSpawnList(string $mapID, string $grpCon)
    {
        $serverCon = "server&".pow(2, $serverType - 1)."=".pow(2, $serverType - 1);

        return DB::table('map_spawn')
            ->select(
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
            ->where('map_spawn.id', '=', $mapID)
            ->where($grpCon)
            ->where(function ($query) {
                $query->where('map_spawn.version', '=', 0)
                    ->orWhere('map_spawn.version', '=', 2);
            })
            ->where('map_spawn.' . $serverCon)
            ->where('monster_stat.version', '=', 2)
            ->where('monster_stat.' . $serverCon)
            ->groupBy('monster')
            ->orderBy('level', 'asc')
            ->orderBy('name2', 'asc')
            ->orderBy('time', 'asc')
            ->get();
    }

    public function getSpawnCount(string $mapID, string $grpID, int $monsterID)
    {
        $serverCon = "server&".pow(2, $serverType - 1)."=".pow(2, $serverType - 1);

        return DB::table('map_spawn')
            ->select(DB::raw('COUNT(monster)'))
            ->where('id', '=', $mapID)
            ->where('monster', '=', $monsterID)
            ->where(function ($query) {
                $query->where('map_spawn.version', '=', 0)
                    ->orWhere('map_spawn.version', '=', 2);
            })
            -whereRaw(DB::raw($serverCon))
            ->get();
    }       

    public function getExtraSpawnList(string $mapID, string $grpID, int $monsterID)
    {
        return DB::table('map_spawn')
            ->select('amount', 'time', 'flag')
            ->where('id', $mapID)
            ->where('monster', $monsterID)
            ->where('grp', $grpID)
            ->where(function($query){
                $query->where('version', '=', 0)
                    ->orWhere('version', '=', 2);
            })
            ->whereRaw(DB:raw($serverCon))
            ->where(function($query) use ($time){
                if($time == null)
                    $query->whereNotNull('time');
                else
                    $query->where('time', '!=', $time);
            })
            ->get();
    }
}