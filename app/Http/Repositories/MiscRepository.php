<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

use App\Model\MapMain;
use App\Model\ItemMain;
use App\Model\ItemArrow;
use App\Model\ShopMain;
use App\Model\ShopItem;
use App\Model\ItemMisc;
use App\Model\TreasureMain;
use App\Model\TreasureDrop;
use App\Model\MonsterDrop;

class MiscRepository
{
    protected $serverType = 1;
    protected $serverCon;

    public function __construct()
    {
        $this->serverCon = "server&" . pow(2, $this->serverType - 1) . "=" . pow(2, $this->serverType - 1) . "";
    }

    public function getMaps()
    {
        return MapMain::select(
                'map_main.id', 
                'map_main.name', 
                DB::raw(
                    'COUNT(shop_main.id) as count'
                )
            )
            ->leftJoin('shop_main', 'map_main.id', '=', 'shop_main.map')
            ->where(function ($query) {
                $query->where('category', '=', 4)
                    ->orWhere('category', '=', 5);
            })
            ->whereNotNull('shop_main.name')
            ->where('visible2', '=', 1)
            ->where(function ($query) {
                $query->where('shop_main.version', '=', 0)
                    ->orWhere('shop_main.version', '=', 2);
            })
            ->groupBy('map_main.id')
            ->orderBy('name')
            ->get();
    }

    public function getShopCategories()
    {
        return ShopMain::select(
                'shop_main.id',
                'shop_main.name',
                DB::raw('map_main.id as map_id'),
                DB::raw('map_main.name as map_name'),
                'category'
            )
            ->leftJoin('map_main', 'shop_main.map', '=', 'map_main.id')
            ->where(function ($query) {
                $query->where('shop_main.version', '=', 0)
                    ->orWhere('shop_main.version', '=', 2);
            })
            ->orderBy('shop_main.id', 'asc')
            ->get();
    }

    public function getShopCount(string $mapID)
    {
        return ShopMain::select('id')
            ->where('map', '=', "'" . $mapID . "'")
            ->count();
    }

    public function getShop(string $shopID)
    {
        return ShopMain::select(
                'shop_main.id',
                'shop_main.name',
                'shop_main.map',
                DB::raw('map_main.id as map_id'),
                DB::raw('map_main.name as map_name'),
                'shop_main.coorX',
                'shop_main.coorY',
                'shop_main.indoor'
            )
            ->leftJoin('map_main', 'shop_main.map', '=', 'map_main.id')
            ->whereRaw('shop_main.id=' . "'" . $shopID . "'")
            ->where(function ($query) {
                $query->where('shop_main.version', '=', 0)
                    ->orWhere('shop_main.version', '=', 2);
            })
            ->first();
    }

    public function getShopItems(string $shopID)
    {
        $serverCon = "server&" . pow(2, $this->serverType - 1) . "=" . pow(2, $this->serverType - 1) . "";
        
        return ShopItem::select(
                'shop_item.id as id',
                'shop_item.item as item',
                'item_main.name as name'
            )
            ->leftJoin('item_main', 'shop_item.item', '=', 'item_main.id')
            ->whereRaw('shop_item.id=' . "'" . $shopID . "'")
            ->where(function ($query) {
                $query->where('shop_item.version', '=', 0)
                    ->orWhere('shop_item.version', '=', 2);
            })
            ->whereRaw($this->serverCon)
            ->orderBy('spot', 'asc')
            ->get();
    }

    public function getShopItemPrice(int $itemID)
    {
        return ItemMisc::select('price')
            ->where('id', '=', $itemID)
            ->whereRaw($this->serverCon)
            ->first();
    }

    public function getRealmList()
    {
        return TreasureMain::select('realm', 'name', 'url')
            ->where('realm', '>', 0)
            ->orderBy('realm', 'asc')
            ->get();
    }

    public function getRealmName(int $realmID)
    {
        return TreasureMain::select('name')
            ->where('realm', '=', $realmID)
            ->first();
    }

    public function getBoxDrops(int $realmID, int $castle)
    {
        if ($realmID > 0)
            $whereCon = "((realm=$realmID AND castle=0) OR (realm=$realmID AND castle=$castle))";
        else
            $whereCon = "realm=$realmID AND castle=$castle";

        return TreasureDrop::select(
                'item_main.id',
                'item_main.name',
                'treasure_drop.rate',
            )
            ->leftJoin('item_main', 'treasure_drop.item', '=', 'item_main.id')
            ->whereRaw($whereCon)
            ->whereRaw($this->serverCon)
            ->orderBy('treasure_drop.rate', 'asc')
            ->orderBy('item_main.category', 'asc')
            ->orderBy('item_main.subcat', 'asc')
            ->orderBy('item_main.name', 'asc')
            ->get();
    }

    public function getRealm(int $realmID)
    {
        return TreasureMain::select('realm', 'name', 'url')
            ->where('realm', '=', $realmID)
            ->first();
    }

    public function getItem(int $arrowID)
    {
        return ItemMain::select('id', 'name')
            ->where('id', '=', $arrowID)
            ->first();
    }

    public function getArrowMaterials(int $arrowID)
    {
        return ItemArrow::select('item', 'name', 'amount')
            ->leftJoin('item_main', 'item_arrow.item', '=', 'item_main.id')
            ->where('arrow', '=', $arrowID)
            ->orderBy('amount', 'desc')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function getArrowsFromItem(int $itemID)
    {
        return ItemArrow::select('arrow', 'name', 'amount')
            ->leftJoin('item_main', 'item_arrow.arrow', '=', 'item_main.id')
            ->where('item', '=', $itemID)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function getMonsterByDrop(int $arrowID)
    {
        return MonsterDrop::select(
                'monster_drop.id',
                'monster_main.name',
                'monster_drop.rate',
                'monster_drop.flag'
            )
            ->leftJoin('monster_main', 'monster_drop.id', '=', 'monster_main.id')
            ->where('item', '=', $arrowID)
            ->where('type', '=', 1)
            ->where(function ($query) {
                $query->where('category', '=', 1)
                    ->orWhere('category', '=', 2)
                    ->orWhere('category', '=', 4);
            })
            ->where(function ($query) {
                $query->where('version', '=', 0)
                    ->orWhere('version', '=', 2);
            })
            ->whereRaw($this->serverCon)
            ->where('visible2', '=', 1)
            ->groupBy('monster_drop.id')
            ->orderBy('monster_drop.rate', 'desc')
            ->orderBy('monster_main.name', 'asc')
            ->get();
    }
}