<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

use App\Http\Helpers\MiscHelpers;
use App\Http\Helpers\MonsterHelpers;

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

    public function getMonstersByInputs(array $searchTerms)
    {
        $serverCon = "monster_stat.server&".pow(2, $this->serverType - 1)."=".pow(2, $this->serverType - 1);
        return MonsterMain::select(
            'monster_main.id',
            'monster_main.name',
            'monster_stat.level',
            'atkMin',
            'atkMax',
            'hp',
            'size',
            'race',
            'eleType',
            'eleLvl',
            'ai',
            'def',
            'mdef',
            'expBase',
            'expJob',
            'statAgi',
            'statVit',
            'statInt',
            'statDex',
            'statLuk'
        )
        ->leftJoin('monster_stat', 'monster_main.id', '=', 'monster_stat.id')
        ->leftJoin('map_spawn', 'monster_main.id', '=', 'map_spawn.monster')
        ->leftJoin('monster_skill', 'monster_main.id', '=', 'monster_skill.id')
        ->leftJoin('skill_main', 'monster_skill.skill', '=', 'skill_main.id')
        ->where(function($query){
            return $query->where('monster_stat.version', '=', 0)
            ->orWhere('monster_stat.version', '=', 2);
        })
        ->whereRaw(DB::raw($serverCon))
        ->where('visible2', '=', 1)
        ->when(is_null($searchTerms["level"]), function($query){
            return $query->where('monster_stat.level', '>=', 1);
        })
        ->when(!is_null($searchTerms["name"]), function ($query) use($searchTerms){
            $names = explode(';', $searchTerms["name"]);
            return $query->where(function($sub) use($names){
                foreach($names as $name){
                    $sub->orWhere('monster_main.name', 'LIKE', '%' . $name . '%');
                }
            });
        })
        ->when(!is_null($searchTerms["map"]), function ($query) use($searchTerms){
            $maps = explode(';', $searchTerms["map"]);
            return $query->where(function($sub) use($maps){
                foreach($maps as $map){
                    $sub->orWhere('map_spawn.id', 'LIKE', '%' . $map . '%');
                }
            });
        })
        ->when(!is_null($searchTerms["skill"]), function ($query) use($searchTerms){
            $skills = explode(';', $searchTerms["skill"]);
            return $query->where(function($sub) use($skills){
                foreach($skills as $skill){
                    $sub->orWhere('skill_main.name', 'LIKE', '%' . $skill . '%');
                }
            });
        })
        ->when(!is_null($searchTerms["looter"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["looter"] === "1")
                {
                    return $query->orWhereRaw('ai&0x4=0x4');
                }
                elseif($searchTerms["looter"] === "0")
                {
                    return $query->whereRaw('ai&0x4=0x4');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["assist"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["assist"] === "1")
                {
                    return $query->orWhereRaw('ai&0x8=0x8');
                }
                elseif($searchTerms["assist"] === "0")
                {
                    return $query->whereRaw('ai&0x8=0x8');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["aggro"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["aggro"] === "1")
                {
                    return $query->orWhereRaw('ai&0x1=0x1 OR ai&0x2=0x2');
                }
                elseif($searchTerms["aggro"] === "0")
                {
                    return $query->whereRaw('ai&0x1=0x1 AND ai&0x2=0x2');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["hyper"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["hyper"] === "1")
                {
                    return $query->orWhereRaw('ai&0x100=0x100');
                }
                elseif($searchTerms["hyper"] === "0")
                {
                    return $query->whereRaw('ai&0x100=0x100');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["ctarget"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["ctarget"] === "1")
                {
                    return $query->orWhereRaw('ai&0x20=0x20 OR ai&0x40=0x40 OR ai&0x80=0x80');
                }
                elseif($searchTerms["ctarget"] === "0")
                {
                    return $query->whereRaw('ai&0x20=0x20 AND ai&0x40=0x40 AND ai&0x80=0x80');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["csensor"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["csensor"] === "1")
                {
                    return $query->orWhereRaw('ai&0x10=0x10');
                }
                elseif($searchTerms["csensor"] === "0")
                {
                    return $query->whereRaw('ai&0x10=0x10');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["mobile"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["mobile"] === "1")
                {
                    return $query->orWhereRaw('mode&0x1=0x1');
                }
                elseif($searchTerms["mobile"] === "0")
                {
                    return $query->whereRaw('mode&0x1=0x1');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["plant"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["plant"] === "1")
                {
                    return $query->orWhereRaw('mode&0x4=0x4');
                }
                elseif($searchTerms["plant"] === "0")
                {
                    return $query->whereRaw('mode&0x4=0x4');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["boss"]), function($query) use($searchTerms){
            try
            {
                if($searchTerms["boss"] === "1")
                {
                    return $query->orWhereRaw('mode&0x8=0x8');
                }
                elseif($searchTerms["boss"] === "0")
                {
                    return $query->whereRaw('mode&0x8=0x8');
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["hp"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["hp"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('hp', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('hp', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["level"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["level"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('monster_stat.level', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('monster_stat.level', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return $query->where('monster_stat.level', '>=', 1);
                }
            }
            catch(\Exception)
            {
                return $query->where('monster_stat.level', '>=', 1);
            }
        })
        ->when(!is_null($searchTerms["attack"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["attack"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('atkMax', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('atkMax', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["def"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["def"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('def', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('def', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["mdef"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["mdef"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('mdef', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('mdef', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["bexp"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["bexp"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereRaw("ABS(`expBase`) BETWEEN " . intval($val1) . " AND " . intval($val2));
                }
                elseif($opType >= 1)
                {
                    return $query->whereRaw("ABS(`expBase`) " . MiscHelpers::getSQLOperationSymbol($opType) . " " . intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["jexp"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["jexp"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereRaw("ABS(`expJob`) BETWEEN " . intval($val1) . " AND " . intval($val2));
                }
                elseif($opType >= 1)
                {
                    return $query->whereRaw("ABS(`expJob`) " . MiscHelpers::getSQLOperationSymbol($opType) . " " . intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["flee"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["flee"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereRaw("170 + `monster_stat`.`level` + `statDex` BETWEEN " . intval($val1) . " AND " . intval($val2));
                }
                elseif($opType >= 1)
                {
                    return $query->whereRaw("170 + `monster_stat`.`level` + `statDex` " . MiscHelpers::getSQLOperationSymbol($opType) . " " . intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["hit"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["hit"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereRaw("200 + `monster_stat`.`level` + `statAgi` BETWEEN " . intval($val1) . " AND " . intval($val2));
                }
                elseif($opType >= 1)
                {
                    return $query->whereRaw("200 + `monster_stat`.`level` + `statAgi` " . MiscHelpers::getSQLOperationSymbol($opType) . " " . intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["agi"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["agi"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('statAgi', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('statAgi', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["vit"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["vit"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('statVit', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('statVit', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["int"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["int"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('statInt', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('statInt', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["dex"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["dex"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('statDex', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('statDex', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["luk"]), function($query) use($searchTerms){
            try
            {
                list($opTp, $val1, $val2) = explode(',', $searchTerms["luk"]);
                $opType = intval($opTp);
                if($opType === 6)
                {
                    return $query->whereBetween('statLuk', [intval($val1), intval($val2)]);
                }
                elseif($opType >= 1)
                {
                    return $query->where('statLuk', MiscHelpers::getSQLOperationSymbol($opType), intval($val1));
                }
                else
                {
                    return null;
                }
            }
            catch(\Exception)
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["category"]) && is_numeric($searchTerms["category"]), function ($query) use($searchTerms){
            return $query->where(function($sub) use($searchTerms){
                for($i = 1; $i <= 6; $i++){
                    if(($searchTerms["category"] & pow(2, $i - 1)) === pow(2, $i - 1)){
                        $sub->orWhere('monster_main.category', '=', $i);
                    }
                }
            });
        })
        ->when(!is_null($searchTerms["size"]) && is_numeric($searchTerms["size"]), function ($query) use($searchTerms){
            return $query->where(function($sub) use($searchTerms){
                for($i = 1; $i <= 3; $i++){
                    if(($searchTerms["size"] & pow(2, $i - 1)) === pow(2, $i - 1)){
                        $sub->orWhere('monster_stat.size', '=', $i);
                    }
                }
            });
        })
        ->when(!is_null($searchTerms["race"]) && is_numeric($searchTerms["race"]), function ($query) use($searchTerms){
            return $query->where(function($sub) use($searchTerms){
                for($i = 1; $i <= 10; $i++){
                    if(($searchTerms["race"] & pow(2, $i - 1)) === pow(2, $i - 1)){
                        $sub->orWhere('monster_stat.race', '=', $i);
                    }
                }
            });
        })
        ->when(!is_null($searchTerms["eletype"]) && is_numeric($searchTerms["eletype"]), function ($query) use($searchTerms){
            return $query->where(function($sub) use($searchTerms){
                for($i = 1; $i <= 10; $i++){
                    if(($searchTerms["eletype"] & pow(2, $i - 1)) === pow(2, $i - 1)){
                        $sub->orWhere('monster_stat.eleType', '=', $i);
                    }
                }
            });
        })
        ->when(!is_null($searchTerms["elelvl"]) && is_numeric($searchTerms["elelvl"]), function ($query) use($searchTerms){
            return $query->where(function($sub) use($searchTerms){
                for($i = 1; $i <= 4; $i++){
                    if(($searchTerms["elelvl"] & pow(2, $i - 1)) === pow(2, $i - 1)){
                        $sub->orWhere('monster_stat.eleLvl', '=', $i);
                    }
                }
            });
        })
        ->when(true, function($query) use($searchTerms){
            if(!is_null($searchTerms["sort"]))
            {
                try
                {
                    list($sortT, $sortD) = explode(',', $searchTerms["sort"]);

                    $sortDir = $sortD === "1" ? "ASC" : "DESC";
                    $sortBy = MonsterHelpers::getSQLMonsterSearchSort(intval($sortT)) . " " . $sortDir;
                    return $query->orderByRaw($sortBy)
                    ->orderBy('monster_main.name');
                }
                catch(\Exception)
                {
                    return $query->orderBy('monster_stat.level')
                    ->orderBy('monster_main.name');
                }
            }
            else
            {
                return $query->orderBy('monster_stat.level')
                ->orderBy('monster_main.name');
            }
        })
        ->distinct()
        ->get();
    }
}
