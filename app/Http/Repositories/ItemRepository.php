<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use App\Http\Helpers\ItemHelpers;

use App\Model\Category;
use App\Model\ItemAdjective;
use App\Model\ItemEnch;
use App\Model\ItemGear;
use App\Model\ItemHeal;
use App\Model\ItemMain;
use App\Model\ItemSet;
use App\Model\ItemSpecial;
use App\Model\ItemWeapon;
use App\Model\MapMain;
use App\Model\MonsterMain;
use App\Model\QuestItem;
use App\Model\QuestMain;
use App\Model\ShopMain;
use App\Model\SkillMain;
use App\Model\TreasureMain;

class ItemRepository
{
    public function getItemTypeName(int $cat, int $subcat = 0, bool $full = false)
    {
        $itemName = Category::select('name')
        ->where('type', '=', 'item')
        ->where('category', '=', $cat)
        ->where('subcat', '=', $subcat)
        ->first();

        if($itemName !== null)
        {
            if ($subcat > 0 && $full === true)
            {
                $itemNameMain = Category::select('name')
                ->where('type', '=','item')
                ->where('category', '=', $cat)
                ->where('subcat', '=', 0)
                ->first();

                return $itemNameMain->name . ": $itemName->name";
            }
            else
            {
                return $itemName->name;
            }
        }

        return "(Unknown)";
    }

    public function getItemsName(Collection $items)
    {
        $output = array();
        if(count($items) > 0)
        {
            foreach($items as $item)
            {
                $itemName = ItemMain::select(
                    'id',
                    'name'
                )
                ->where('id', '=', $item->item)
                ->first();

                array_push($output, $itemName);
            }
        }
        return $output;
    }

    public function getItemNameById(int $id)
    {
        return ItemMain::select(
            'name'
        )
        ->where('id', '=', $id)
        ->first();
    }

    public function getMonsterNameById(int $id)
    {
        return MonsterMain::select(
            'name'
        )
        ->where('id', '=', $id)
        ->first();
    }

    public function getMapNameById(string $id)
    {
        return MapMain::select(
            'name'
        )
        ->where('id', '=', $id)
        ->first();
    }

    public function getSkillNameById(int $id)
    {
        return SkillMain::select(
            'name'
        )
        ->where('id', '=', $id)
        ->first();
    }

    public function getItemMenuCat(int|null $id = null)
    {
        if ($id !== null) {
            $itemMenuCat = Category::select('name', 'category', 'subcat')
                ->where('type', '=', 'item')
                ->where('category', '=', $id)
                ->where('subcat', '=', 0)
                ->where('version', '!=', 3)
                ->orderBy('category', 'asc')
                ->get();
            return $itemMenuCat;
        } else {
            $itemMenuCat = Category::select('name', 'category', 'subcat')
                ->where('type', '=', 'item')
                ->where('subcat', '=', 0)
                ->where('version', '!=', 3)
                ->orderBy('category', 'asc')
                ->get();
            return $itemMenuCat;
        }
    }

    public function getSubMenuCat(int|null $id = null)
    {
        if ($id !== null) {
            $itemSubMenuCat = Category::select('name', 'category', 'subcat')
                ->where('type', '=', 'item')
                ->where('category', '=', $id)
                ->where('subcat', '!=', 0)
                ->where('version', '!=', 3)
                ->orderBy('category', 'asc')
                ->get();
            return $itemSubMenuCat;
        } else {
            $itemSubMenuCat = Category::select('name', 'category', 'subcat')
                ->where('type', '=', 'item')
                ->where('subcat', '!=', 0)
                ->where('version', '!=', 3)
                ->orderBy('category', 'asc')
                ->get();
            return $itemSubMenuCat;
        }
    }

    public function itemInfo(int|null $id = null)
    {
        $serverType = 1;
        $serverCon = "server&".pow(2, $serverType - 1)."=".pow(2, $serverType - 1);

        $questType = array(
            1 => "Requirement",
            2 => "Quest Item",
            3 =>"Reward",
            4 =>"Exchange Requirement",
            5 =>"Exchange Reward"
        );

        $output = array(
            "item" => null,
            "weapon" => null,
            "gear" => null,
            "monster" => null,
            "monsterSpawn" => null,
            "quest" => null,
            "treasureDrop" => null,
            "adjective" => null,
            "itemSet" => null,
            "itemHeal" => null,
            "itemEnchant" => null,
            "itemSpecialMain" => null,
            "itemSpecialGroupMain" => null,
            "itemSpecialGroupList" => null,
            "itemSpecialStats" => null,
            "itemShop" => null
        );

        $itemMain = ItemMain::select(
            'name',
            'item_main.id',
            'description',
            'unident',
            'notes',
            'category',
            'subcat',
            'weight',
            'slots',
            'reqlv',
            'upgrade',
            'damage',
            'buyable',
            'job',
            'price',
            'binding'
        )
            ->leftJoin('item_misc', 'item_misc.id', '=', 'item_main.id')
            ->where('item_main.id', '=', $id)
            ->where('item_misc.version', '!=', 3)
            ->whereRaw(DB::raw($serverCon))
            ->first();
        
        $output["item"] = $itemMain;

        if($itemMain === null)
        {
            return $output;
        }

        if($itemMain->category === 1 || $itemMain->category === 9)
        {
            $weaponInfo = ItemWeapon::select(
                'atk',
                'matk2',
                'element',
                'level'
            )
            ->where('id', '=', $id)
            ->first();

            $output["weapon"] = $weaponInfo;
        }

        if($itemMain->category === 2 || $itemMain->category === 8)
        {
            $gearInfo = ItemGear::select(
                'def2',
                'mdef2',
                'position'
            )
            ->where('id', '=', $id)
            ->first();

            $output["gear"] = $gearInfo;
        }

        if($itemMain->category === 3)
        {
            $adjectiveInfo = ItemAdjective::select(
                'adjective'
            )
            ->where('id', '=', $id)
            ->first();

            $output["adjective"] = $adjectiveInfo;
        }

        if($itemMain->category === 4 && $itemMain->subcat === 2)
        {
            $itemHealInfo = ItemHeal::select(
                'hpMin',
                'hpMax',
                'spMin',
                'spMax'
            )
            ->where('id', '=', $id)
            ->first();

            $output["itemHeal"] = $itemHealInfo;
        }

        if($itemMain->category === 1 || $itemMain->category === 2 || $itemMain->category === 5 || $itemMain->category === 8)
        {
            $itemEnchantInfo = ItemEnch::select(
                'enchantment.name',
                'enchantment.location',
                'enchantment.wiki'
            )
            ->leftJoin('enchantment', 'item_ench.type', '=', 'enchantment.npc_id')
            ->where('item_ench.id', '=', $id)
            ->whereRaw(DB::raw($serverCon))
            ->get();

            $output["itemEnchant"] = count($itemEnchantInfo) > 0 ? $itemEnchantInfo : null;
        }

        $itemSetCheckInfo = ItemSet::select(
            'id',
            'type'
        )
        ->where('item', '=', $id)
        ->get();

        $itemSetInfo = array();
        if(count($itemSetCheckInfo) > 0)
        {
            foreach($itemSetCheckInfo as $itemSet)
            {
                $itemSetList = null;

                if($itemSet->type === 1)
                {
                    $itemSetList = ItemSet::select(
                        'item'
                    )
                    ->where('id', '=', $itemSet->id)
                    ->where('item', '!=', $id)
                    ->get();
                }
                elseif($itemSet->type === 2)
                {
                    $itemSetList = ItemSet::select(
                        'item'
                    )
                    ->where('id', '=', $itemSet->id)
                    ->where('item', '!=', $id)
                    ->where('type', '=', 3)
                    ->get();
                }
                elseif($itemSet->type === 3)
                {
                    $itemSetList = ItemSet::select(
                        'item'
                    )
                    ->where('id', '=', $itemSet->id)
                    ->where('item', '!=', $id)
                    ->where('type', '=', 2)
                    ->get();
                }

                $itemSetSpecial = ItemSpecial::select(
                    'special'
                )
                ->where('type', '=', 2)
                ->where('id', '=', $itemSet->id)
                ->where('grp', '=', 0)
                ->where(function($version)
                {
                    $version->where('version', '=', 0)
                    ->orWhere('version', '=', 2);
                })
                ->whereRaw(DB::raw($serverCon))
                ->orderBy('index', 'asc')
                ->get();

                $itemSetGroupMain = ItemSpecial::select(
                    'grp',
                    'special'
                )
                ->where('type', '=', 2)
                ->where('id', '=', $itemSet->id)
                ->where('grp', '>', 0)
                ->where('num', '=', 0)
                ->where(function($version)
                {
                    $version->where('version', '=', 0)
                    ->orWhere('version', '=', 2);
                })
                ->whereRaw(DB::raw($serverCon))
                ->orderBy('index', 'asc')
                ->get();

                $itemSetGroupMainList = array();

                if(count($itemSetGroupMain) > 0)
                {   
                    foreach($itemSetGroupMain as $itemGroup)
                    {
                        $itemSetGroupList = ItemSpecial::select(
                            'special'
                        )
                        ->where('type', '=', 2)
                        ->where('id', '=', $itemSet->id)
                        ->where('grp', '=', $itemGroup->grp)
                        ->where('num', '>', 0)
                        ->where(function($version)
                        {
                            $version->where('version', '=', 0)
                            ->orWhere('version', '=', 2);
                        })
                        ->whereRaw(DB::raw($serverCon))
                        ->orderBy('index', 'asc')
                        ->get();

                        $itemSetGroupMainList[$itemGroup->grp] = $itemSetGroupList;
                    }
                }

                array_push($itemSetInfo, ["setType" => $itemSet->type, "itemSetInfo" => $itemSetList, "itemSetSpecial" => $itemSetSpecial, "itemSetGroupMain" => $itemSetGroupMain, "itemSetGroupList" => $itemSetGroupMainList]);
            }
        }

        $output["itemSet"] = count($itemSetInfo) > 0 ? $itemSetInfo : null;

        $itemSpecialCheckInfo = ItemSpecial::select(
            'special'
        )
        ->where('type', '=', 1)
        ->where('id', '=', $id)
        ->where('stat', '=', 0)
        ->where(function($version)
        {
            $version->where('version', '=', 0)
            ->orWhere('version', '=', 2);
        })
        ->whereRaw(DB::raw($serverCon))
        ->first();

        if($itemSpecialCheckInfo !== null)
        {
            $itemSpecialMainInfo = ItemSpecial::select(
                'special'
            )
            ->where('type', '=', 1)
            ->where('id', '=', $id)
            ->where('stat', '=', 0)
            ->where('grp', '=', 0)
            ->where(function($version)
            {
                $version->where('version', '=', 0)
                ->orWhere('version', '=', 2);
            })
            ->whereRaw(DB::raw($serverCon))
            ->orderBy('index', 'asc')
            ->get();
    
            $output["itemSpecialMain"] = count($itemSpecialMainInfo) > 0 ? $itemSpecialMainInfo : null;
    
            $itemSpecialGroupMainInfo = ItemSpecial::select(
                'grp',
                'special'
            )
            ->where('type', '=', 1)
            ->where('id', '=', $id)
            ->where('num', '=', 0)
            ->where('grp', '>', 0)
            ->where(function($version)
            {
                $version->where('version', '=', 0)
                ->orWhere('version', '=', 2);
            })
            ->whereRaw(DB::raw($serverCon))
            ->orderBy('index', 'asc')
            ->get();
    
            $output["itemSpecialGroupMain"] = count($itemSpecialGroupMainInfo) > 0 ? $itemSpecialGroupMainInfo : null;

            $itemSpecialGroupListArray = array();
            foreach($itemSpecialGroupMainInfo as $groupMain)
            {
                $itemSpecialGroupListInfo = ItemSpecial::select(
                    'special'
                )
                ->where('type', '=', 1)
                ->where('id', '=', $id)
                ->where('num', '>', 0)
                ->where('grp', '=', $groupMain->grp)
                ->where(function($version)
                {
                    $version->where('version', '=', 0)
                    ->orWhere('version', '=', 2);
                })
                ->whereRaw(DB::raw($serverCon))
                ->orderBy('index', 'asc')
                ->get();

                $itemSpecialGroupListArray[$groupMain->grp] = $itemSpecialGroupListInfo;
            }

            $output["itemSpecialGroupList"] = count($itemSpecialGroupListArray) > 0 ? $itemSpecialGroupListArray : null;
        }

        $itemSpecialStatsInfo = ItemSpecial::select(
            'special'
        )
        ->where('type', '=', 1)
        ->where('id', '=', $id)
        ->where('stat', '=', 1)
        ->where('version', '!=', 3)
        ->whereRaw(DB::raw($serverCon))
        ->orderBy('index', 'asc')
        ->get();

        $output["itemSpecialStats"] = count($itemSpecialStatsInfo) > 0 ? $itemSpecialStatsInfo : null;

        $itemShopInfo = ShopMain::select(
            'shop_main.id',
            'shop_main.name AS shopName',
            'map_main.name AS mapName'
        )
        ->leftJoin('shop_item', 'shop_main.id', '=', 'shop_item.id')
        ->leftJoin('map_main', 'shop_main.map', '=', 'map_main.id')
        ->where('shop_item.item', '=', $id)
        ->where('shop_main.version', '!=', 3)
        ->where('shop_item.version', '!=', 3)
        ->whereRaw(DB::raw($serverCon))
        ->orderBy('map_main.name', 'asc')
        ->orderBy('shop_main.name', 'asc')
        ->get();

        $output["itemShop"] = count($itemShopInfo) > 0 ? $itemShopInfo : null;
    
        $monsterItemVisibleInfo = ItemMain::select(
            'visible2'
        )
        ->where('id', '=', $id)
        ->first();

        $monsterInfo = MonsterMain::groupBy('monster_main.id')
        ->select(
            'monster_main.id',
            'name',
            'level',
            'eleType',
            'eleLvl',
            DB::raw('
                CASE WHEN level >= 0 AND statDex >= 0 THEN 170 + level + statDex ELSE -1 END AS flee
            '),
            DB::raw('
                CASE WHEN level >= 0 AND statAgi >= 0 THEN 200 + level + statAgi ELSE -1 END AS hit
            '),
            'rate',
        )
        ->leftJoin('monster_stat', 'monster_main.id', '=', 'monster_stat.id')
        ->leftJoin('monster_drop', 'monster_main.id', '=', 'monster_drop.id')
        ->where('item', '=', $id)
        ->where('type', '=', 1)
        ->where('monster_stat.version', '=', 2)
        ->whereRaw(DB::raw('monster_stat.'.$serverCon))
        ->where('monster_drop.version', '!=', 3)
        ->whereRaw(DB::raw('monster_drop.'.$serverCon))
        ->where('monster_drop.rate', '>', 0)
        ->when($monsterItemVisibleInfo !== null && $monsterItemVisibleInfo->visible2 === 1, function($query) {
            $query->where('monster_main.visible2', '=', 1);
        })
        ->orderBy('rate', 'desc')
        ->orderBy('level', 'asc')
        ->orderBy('name', 'asc')
        ->get();

        $output["monster"] = count($monsterInfo) > 0 ? $monsterInfo : null;

        $monsterSpawnInfoArray = array();
        foreach($monsterInfo as $monster)
        {
            $monsterSpawnInfo = MapMain::select(
                'map_main.id',
                'map_main.name',
                DB::raw('SUM(amount) as amount'),
                'map_spawn.flag',
                'map_spawn.monster'
            )
            ->leftJoin('map_spawn', 'map_main.id', '=', 'map_spawn.id')
            ->where('map_spawn.monster', '=', $monster->id)
            ->where(function($version) {
                $version->where('map_spawn.version', '=', 2)
                ->orWhere('map_spawn.version', '=', 0);
            })
            ->whereRaw(DB::raw($serverCon))
            ->groupBy('map_main.id')
            ->orderBy('amount', 'desc')
            ->first();

            if($monsterSpawnInfo !== null)
            {
                array_push($monsterSpawnInfoArray, $monsterSpawnInfo);
            }
        }

        $output["monsterSpawn"] = count($monsterSpawnInfoArray) > 0 ? $monsterSpawnInfoArray : null;

        $checkQuestInfo = QuestItem::select(DB::raw('1'))
        ->where('item', '=', $id)
        ->whereRaw(DB::raw($serverCon))
        ->first();

        if($checkQuestInfo !== null)
        {
            $questList = array(
                "Requirement" => null,
                "Quest Item" => null,
                "Reward" => null,
                "Exchange Requirement" => null,
                "Exchange Reward" => null
            );

            foreach($questType as $typeId => $value)
            {
                $questInfo = QuestMain::select(
                    'name',
                    'wiki',
                    'amount'
                )
                ->leftJoin('quest_item', 'quest_main.id', '=', 'quest_item.id')
                ->where('quest_item.item', '=', $id)
                ->where('quest_item.type', '=', $typeId)
                ->whereRaw(DB::raw('quest_item.'.$serverCon))
                ->whereRaw(DB::raw('quest_main.'.$serverCon))
                ->orderBy('quest_main.name', 'asc')
                ->get();

                $questList[$value] = count($questInfo) > 0 ? $questInfo : null;
            }

            $output["quest"] = $questList;
        }

        $treasureInfo = TreasureMain::select(
            'treasure_main.name',
            'treasure_main.realm',
            'treasure_drop.castle',
            'treasure_drop.rate',
            'treasure_main.url'
        )
        ->leftJoin('treasure_drop', 'treasure_main.realm', '=', 'treasure_drop.realm')
        ->where('treasure_drop.item', '=', $id)
        ->whereRaw(DB::raw($serverCon))
        ->get();

        $output["treasureDrop"] = count($treasureInfo) > 0 ? $treasureInfo : null;

        return $output;
    }

    public function WeaponSearch(array $searchTerms)
    {

        $serverType = 1;
        $serverCon = "item_misc.server&".pow(2, $serverType - 1)."=".pow(2, $serverType - 1);

        $output = array(
            "weaponInfo" => null,
            "weaponSpecial" => null
        );

        $mainQuery = ItemMain::leftJoin('item_weapon', 'item_main.id', '=', 'item_weapon.id')
        ->leftJoin('item_misc', 'item_main.id', '=', 'item_misc.id')
        ->when((!is_null($searchTerms["detailed"]) && $searchTerms["detailed"] === "true") || !is_null($searchTerms["effect"]), function($query){
            return $query->leftJoin('item_special', 'item_main.id', '=', 'item_special.id')
            ->where(function($sub){
                return $sub->where('item_special.type', '=', 1)
                ->orWhereNull('item_special.type');
            });
        })
        ->when(!is_null($searchTerms["detailed"]) && $searchTerms["detailed"] === "true", function($query){
            return $query->where(function($sub){
                return $sub->where('item_special.version', '=', 0)
                ->orWhere('item_special.version', '=', 2)
                ->orWhereNull('item_special.version');
            });
        })
        ->when(!is_null($searchTerms["type"]), function($query) use($searchTerms){
            return $query->where('subcat', '=', intval($searchTerms["type"]));
        })
        ->when(!is_null($searchTerms["name"]), function ($query) use($searchTerms){
            $names = explode(';', $searchTerms["name"]);
            return $query->where(function($sub) use($names){
                foreach($names as $name){
                    $sub->orWhere('name', 'LIKE', '%' . $name . '%');
                }
            });
        })
        ->when(!is_null($searchTerms["effect"]), function($query) use($searchTerms){
            return $query->where('item_special.special', 'LIKE', '%' . $searchTerms["effect"] . '%');
        })
        ->when(!is_null($searchTerms["upgradable"]), function($query) use($searchTerms){
            return $query->where('upgrade', '=', $searchTerms["upgradable"]);
        })
        ->when(!is_null($searchTerms["breakable"]), function($query) use($searchTerms){
            return $query->where('damage', '=', $searchTerms["breakable"]);
        })
        ->when(!is_null($searchTerms["binding"]), function($query) use($searchTerms){
            return $query->where('binding', '=', $searchTerms["binding"]);
        })
        ->when(!is_null($searchTerms["element"]), function($query) use($searchTerms){
            return $query->where('element', '=', $searchTerms["element"]);
        })
        ->when(!is_null($searchTerms["atk"]), function($query) use($searchTerms){
            list($opTp, $atk, $atk2) = explode(',', $searchTerms["atk"]);
            $opType = intval($opTp);
            if($opType === 6)
            {
                return $query->whereBetween('atk', [intval($atk), intval($atk2)]);
            }
            elseif($opType >= 1)
            {
                return $query->where('atk', ItemHelpers::getSQLOperationSymbol($opType), intval($atk));
            }
            else
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["matk"]), function($query) use($searchTerms){
            list($opTp, $matk, $matk2) = explode(',', $searchTerms["matk"]);
            $opType = intval($opTp);
            if($opType === 6)
            {
                return $query->whereBetween('matk2', [intval($matk), intval($matk2)]);
            }
            elseif($opType >= 1)
            {
                return $query->where('matk2', ItemHelpers::getSQLOperationSymbol($opType), intval($matk));
            }
            else
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["slots"]), function($query) use($searchTerms){
            list($opTp, $slot, $slot2) = explode(',', $searchTerms["slots"]);
            $opType = intval($opTp);
            if($opType === 6)
            {
                return $query->whereBetween('slots', [intval($slot), intval($slot2)]);
            }
            elseif($opType >= 1)
            {
                return $query->where('slots', ItemHelpers::getSQLOperationSymbol($opType), intval($slot));
            }
            else
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["wepLv"]), function($query) use($searchTerms){
            list($opTp, $lv1, $lv2) = explode(',', $searchTerms["wepLv"]);
            $opType = intval($opTp);
            if($opType === 6)
            {
                return $query->whereBetween('level', [intval($lv1), intval($lv2)]);
            }
            elseif($opType >= 1)
            {
                return $query->where('level', ItemHelpers::getSQLOperationSymbol($opType), intval($lv1));
            }
            else
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["reqLv"]), function($query) use($searchTerms){
            list($opTp, $lv1, $lv2) = explode(',', $searchTerms["reqLv"]);
            $opType = intval($opTp);
            if($opType === 6)
            {
                return $query->whereBetween('reqlv', [intval($lv1), intval($lv2)]);
            }
            elseif($opType >= 1)
            {
                return $query->where('reqlv', ItemHelpers::getSQLOperationSymbol($opType), intval($lv1));
            }
            else
            {
                return null;
            }
        })
        ->when(!is_null($searchTerms["job"]) && is_numeric($searchTerms["job"]), function($query) use($searchTerms){
            $job = intval($searchTerms["job"]);
            if($job >= 1 && $job <= 99)
            {
                $jobMask = pow(2, $job + 1);
                return $query->whereRaw("job&$jobMask=$jobMask AND NOT (job&0x1=0x1 OR job&0x2=0x2)");
            }
            elseif($job >= 101 && $job <= 199)
            {
                $jobMask = pow(2, $job - 99);
                return $query->whereRaw("job&$jobMask=$jobMask AND NOT job&0x2=0x2");
            }
            elseif($job >= 201 && $job <= 299)
            {
                $jobMask = pow(2, $job - 199);
                return $query->whereRaw("job&$jobMask=$jobMask");
            }
            elseif($job >= 301 && $job <= 399)
            {
                $jobMask = pow(2, $job - 279);
                return $query->whereRaw("job&$jobMask=$jobMask");
            }
            else
            {
                return null;
            }
        })
        ->where('category', '=', 1)
        ->where('item_misc.version', '!=', 3)
        ->where('visible2', '=', 1)
        ->whereRaw(DB::raw($serverCon))
        ->when(true, function($query) use($searchTerms){
            if(!is_null($searchTerms["sort"]))
            {
                list($sortT, $sortD) = explode(',', $searchTerms["sort"]);

                if($sortT !== "1")
                {
                    return $query->orderBy(ItemHelpers::getSQLWeaponSort($sortT), $sortD === "1" ? 'asc' : 'desc')
                    ->orderBy('name');
                }
                else
                {
                    return $query->orderBy(ItemHelpers::getSQLWeaponSort($sortT), $sortD === "1" ? 'asc' : 'desc');
                }
            }
            else
            {
                return $query->orderBy('name', 'asc');
            }
        })
        ->distinct();

        $weaponInfo = $mainQuery->select(
            'item_main.id',
            'name',
            'weight',
            'level',
            'reqlv',
            'element',
            'upgrade',
            'damage',
            'binding',
            'atk',
            'matk2'
        )
        ->get();

        $output["weaponInfo"] = $weaponInfo;
        
        if(!is_null($searchTerms["detailed"]) && $searchTerms["detailed"] === "true")
        {
            $weaponSpecialList = array();

            $weaponSpecial = $mainQuery->select(
                'item_main.id',
                'special',
                'description'
            )
            ->get()->all();

            $weaponTemporal = array(
                "description" => null,
                "special" => array()
            );
            while($item = current($weaponSpecial))
            {
                $nextItem = next($weaponSpecial);

                if(is_null($weaponTemporal["description"]))
                {
                    $weaponTemporal["description"] = $item->description;
                }
                
                if(!is_null($item->special))
                {
                    array_push($weaponTemporal["special"], $item->special);
                }
                
                if($nextItem)
                {
                    if($item->id !== $nextItem->id)
                    {
                        $weaponSpecialList[$item->id] = $weaponTemporal;
                        $weaponTemporal = array(
                            "description" => null,
                            "special" => array()
                        );
                    }
                }
                else
                {
                    $weaponSpecialList[$item->id] = $weaponTemporal;
                    $weaponTemporal = array(
                        "description" => null,
                        "special" => array()
                    );
                }
            }
            $output["weaponSpecial"] = $weaponSpecialList;
        }

        return $output;
    }
}
