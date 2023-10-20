<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

use App\Model\Category;
use App\Model\ItemAdjective;
use App\Model\ItemEnch;
use App\Model\ItemGear;
use App\Model\ItemHeal;
use App\Model\ItemMain;
use App\Model\ItemSpecial;
use App\Model\ItemWeapon;
use App\Model\MapMain;
use App\Model\MonsterMain;
use App\Model\QuestItem;
use App\Model\QuestMain;
use App\Model\ShopMain;
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

        if ($subcat > 0 && $full === true && $itemName !== null)
        {
            $itemNameMain = Category::select('name')
            ->where('type', '=','item')
            ->where('category', '=', $cat)
            ->where('subcat', '=', 0)
            ->first();

            return $itemNameMain->name . ": $itemName->name";
        }

        return $itemName->name;
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
            ->get();

            $output["weapon"] = count($weaponInfo) > 0 ? $weaponInfo : null;
        }

        if($itemMain->category === 2 || $itemMain->category === 8)
        {
            $gearInfo = ItemGear::select(
                'def2',
                'mdef2',
                'position'
            )
            ->where('id', '=', $id)
            ->get();

            $output["gear"] = count($gearInfo) > 0 ? $gearInfo : null;
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
            ->get();

            $output["itemHeal"] = count($itemHealInfo) > 0 ? $itemHealInfo : null;
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

                array_push($itemSpecialGroupListArray, $itemSpecialGroupListInfo);
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
}
