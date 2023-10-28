<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

use App\Model\Category;
use App\Model\Element;
use App\Model\MapMain;
use App\Model\MonsterDrop;
use App\Model\MonsterMain;
use App\Model\MonsterMeta;
use App\Model\MonsterMob;
use App\Model\MonsterSkill;
use App\Model\MonsterStat;

class MonsterRepository
{
    protected $serverType = 1;

    public function getMenuCategories(int|null $id)
    {
        if(is_null($id))
        {
            return Category::select(
                'name',
                'category'
            )
            ->where('type', '=', 'monster')
            ->where(function($query){
                return $query->where('version', '=', 0)
                ->orWhere('version', '=', 2);
            })
            ->orderBy('category')
            ->get();
        }
        else
        {
            return Category::select(
                'name',
                'category'
            )
            ->where('type', '=', 'monster')
            ->where('category', '=', $id)
            ->where(function($query){
                return $query->where('version', '=', 0)
                ->orWhere('version', '=', 2);
            })
            ->orderBy('category')
            ->get();
        }
    }

    public function getMenuMonsters(int|null $id)
    {
        if(is_null($id))
        {
            return MonsterMain::select(
                'id',
                'name',
                'category'
            )
            ->orderBy('id')
            ->get();
        }
        else
        {
            return MonsterMain::select(
                'id',
                'name',
                'category'
            )
            ->where('id', '=', $id)
            ->orderBy('id')
            ->get();
        }
    }

    public function getMonsterById(int $id)
    {
        $serverCon = "monster_stat.server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        return MonsterMain::select(
            'monster_main.id',
            'name',
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
            'atkMin',
            'atkMax',
            'atkRange',
            'aspd',
            'mspeed',
            'statAgi',
            'statVit',
            'statInt',
            'statDex',
            'statLuk'
        )
        ->leftJoin('monster_stat', 'monster_main.id', '=', 'monster_stat.id')
        ->where('monster_main.id', '=', $id)
        ->where(function($query){
            return $query->where('monster_stat.version', '=', 0)
            ->orWhere('monster_stat.version', '=', 2);
        })
        ->whereRaw(DB::raw($serverCon))
        ->first();
    }

    public function getMonsterElementChart(int $eleType, int $eleLvl)
    {
        return Element::select(
            'offense',
            'modifier'
        )
        ->where('defense', '=', $eleType)
        ->where('level', '=', $eleLvl)
        ->where('version', '=', 2)
        ->whereIn('offense', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
        ->orderBy('offense')
        ->get();
    }

    public function getMonsterDropByIdAndType(int $id, int $type)
    {
        $serverCon = "monster_drop.server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        return MonsterDrop::select(
            'item',
            'name',
            'rate',
            'flag'
        )
        ->leftJoin('item_main', 'monster_drop.item', '=', 'item_main.id')
        ->where('monster_drop.id', '=', $id)
        ->where('monster_drop.type', '=', $type)
        ->where(function($query){
            return $query->where('monster_drop.version', '=', 0)
            ->orWhere('monster_drop.version', '=', 2);
        })
        ->whereRaw(DB::raw($serverCon))
        ->orderBy('slot')
        ->get();
    }

    public function getMonsterMapListById(int $id)
    {
        $serverCon = "map_spawn.server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        $monsterInfo = MonsterMain::select(
            'visible2'
        )
        ->where('id', '=', $id)
        ->first();

        return MapMain::select(
            'map_main.id',
            'map_main.name',
            'category.name as catname',
            DB::raw('SUM(amount) as amount'),
            DB::raw('COUNT(amount) as count'),
            DB::raw('MIN(time) as time'),
            'map_spawn.flag'
        )
        ->leftJoin('map_spawn', 'map_main.id', '=', 'map_spawn.id')
        ->leftJoin('category', 'map_main.category', '=', 'category.category')
        ->where('category.type', '=', 'map')
        ->where('monster', '=', $id)
        ->where(function($query){
            return $query->where('map_spawn.version', '=', 0)
            ->orWhere('map_spawn.version', '=', 2);
        })
        ->whereRaw(DB::raw($serverCon))
        ->when(!is_null($monsterInfo) && $monsterInfo->visible2 === 1, function($query){
            return $query->where('visible2', '=', 1);
        })
        ->groupBy('map_main.id')
        ->orderBy('map_main.category')
        ->orderBy('map_main.name')
        ->get();
    }

    public function getMonsterModeListById(int $id)
    {
        $serverCon = "server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        return MonsterStat::select(
            'level',
            'mode',
            'ai'
        )
        ->where('id', '=', $id)
        ->where(function($query){
            return $query->where('version', '=', 0)
            ->orWhere('version', '=', 2);
        })
        ->whereRaw(DB::raw($serverCon))
        ->first();
    }

    public function getMonsterSkillsById(int $id)
    {
        $serverCon = "monster_skill.server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        return MonsterSkill::select(
            'monster_skill.skill',
            'name',
            'level'
        )
        ->leftJoin('skill_main', 'monster_skill.skill', '=', 'skill_main.id')
        ->where('monster_skill.id', '=', $id)
        ->where('skill_main.id', '!=', 197)
        ->where('skill_main.id', '!=', 474)
        ->where(function($query){
            return $query->where('monster_skill.version', '=', 0)
            ->orWhere('monster_skill.version', '=', 2);
        })
        ->whereRaw(DB::raw($serverCon))
        ->groupBy('monster_skill.skill')
        ->orderBy('monster_skill.skill')
        ->get();
    }

    public function getMonsterSpawnMobById(int $id)
    {
        $monsterInfo = MonsterMain::select(
            'visible2'
        )
        ->where('id', '=', $id)
        ->first();

        return MonsterMob::select(
            'monster_main.id',
            'monster_mob.slave',
            'monster_main.name',
            'monster_mob.amount'
        )
        ->leftJoin('monster_main', 'monster_mob.slave', '=', 'monster_main.id')
        ->where('monster_mob.id', '=', $id)
        ->where('monster_mob.type', '=', 1)
        ->when(!is_null($monsterInfo) && $monsterInfo->visible2 === 1, function($query){
            return $query->where('monster_main.visible2', '=', 1);
        })
        ->orderBy('monster_mob.amount', 'desc')
        ->orderBy('monster_main.name')
        ->get();
    }

    public function getMonsterSummonMobById(int $id)
    {
        $monsterInfo = MonsterMain::select(
            'visible2'
        )
        ->where('id', '=', $id)
        ->first();

        return MonsterMob::select(
            'monster_main.id',
            'monster_main.name',
            'monster_mob.slave',
            'monster_mob.amount'
        )
        ->leftJoin('monster_main', 'monster_mob.slave', '=', 'monster_main.id')
        ->where('monster_mob.id', '=', $id)
        ->where('monster_mob.type', '=', 2)
        ->when(!is_null($monsterInfo) && $monsterInfo->visible2 === 1, function($query){
            return $query->where('monster_main.visible2', '=', 1);
        })
        ->orderBy('monster_mob.amount', 'desc')
        ->orderBy('monster_main.name')
        ->get();
    }

    public function getMonsterSummonListById(int $id)
    {
        $monsterInfo = MonsterMain::select(
            'visible2'
        )
        ->where('id', '=', $id)
        ->first();

        return MonsterMob::select(
            'monster_mob.id',
            'monster_main.name'
        )
        ->leftJoin('monster_main', 'monster_mob.id', '=', 'monster_main.id')
        ->where('monster_mob.slave', '=', $id)
        ->when(!is_null($monsterInfo) && $monsterInfo->visible2 === 1, function($query){
            return $query->where('monster_main.visible2', '=', 1);
        })
        ->groupBy('monster_mob.id')
        ->orderBy('monster_main.name')
        ->get();
    }

    public function getMonsterMetamorphosisListById(int $id)
    {
        return MonsterMeta::select(
            'name',
            'monster',
            'amount'
        )
        ->leftJoin('monster_main', 'monster_meta.monster', '=', 'monster_main.id')
        ->where('monster_meta.id', '=', $id)
        ->get();
    }
}
