<?php

namespace App\Http\Repositories;

use App\Model\ItemAdjective;
use App\Model\ItemArrow;
use App\Model\ItemEnch;
use App\Model\ItemGear;
use App\Model\ItemHeal;
use App\Model\ItemMain;
use App\Model\ItemMisc;
use App\Model\ItemSet;
use App\Model\ItemSpecial;
use App\Model\ItemWeapon;

class SearchRepository
{
    protected $items;

    public function searchItems(string $term)
    {
        $type = "item";
        $items = ItemMain::leftJoin('item_adjective', 'item_main.id', '=', 'item_adjective.id')->
        join('item_misc', 'item_main.id', '=', 'item_misc.id')->
        join('category AS c1', function ($cat) {
            $cat->
            on('item_main.category', '=', 'c1.category')->
            on('item_main.subcat', '=', 'c1.subcat');
        })->
        leftJoin('category AS c2', 'item_main.category', '=', 'c2.category')->
        select('item_main.id', 'item_main.name', 'c1.name AS category', 'c2.name AS subcat')->
        where('item_main.name', 'like', substr_replace('%%', $term, 1, 0))->
        where('item_main.visible2', '=', 1)->
        where('item_misc.version', '!=', 3)->
        where('c2.subcat', '=', 0)->
        where('c2.type', '=', $type)->
        orderBy('item_main.name', 'asc')->
        get();
        return $items;
    }
}