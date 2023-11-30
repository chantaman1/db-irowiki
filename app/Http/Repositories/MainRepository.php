<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

use App\Model\Category;
use App\Model\ItemMain;
use App\Model\News;
use App\Model\MapMain;
use App\Model\MonsterMain;
use App\Model\ShopMain;

class MainRepository
{
    public function getSearchItems(string $term)
    {
        return ItemMain::leftJoin('item_adjective', 'item_main.id', '=', 'item_adjective.id')
        ->join('item_misc', 'item_main.id', '=', 'item_misc.id')
        ->select(
            DB::raw('1 AS type'),
            'item_main.id',
            'item_main.name',
            'item_main.category',
            'item_main.subcat'
        )
        ->orWhere('item_main.id', 'like', substr_replace('%%', $term, 1, 0))
        ->orWhere('item_main.name', 'like', substr_replace('%%', $term, 1, 0))
        ->orWhere('item_adjective.adjective', 'like', substr_replace('%%', $term, 1, 0))
        ->where('item_main.visible2', '=', 1)
        ->where('item_misc.version', '!=', 3)
        ->orderBy('item_main.name', 'asc')
        ->get();
    }

    public function getSearchMonsters(string $term)
    {
        return MonsterMain::select(
            DB::raw('2 AS type'),
            'id',
            'name',
            'category',
            DB::raw('0 AS subcat')
        )
        ->where('visible2', '=', 1)
        ->where(function ($query) use ($term) {
            $query->where('id', 'like', substr_replace('%%', $term, 1, 0))
            ->orWhere('name', 'like', substr_replace('%%', $term, 1, 0));
        })
        ->orderBy('name', 'asc')
        ->get();
    }

    public function getSearchMaps(string $term)
    {
        return MapMain::select(
            DB::raw('3 AS type'),
            'id',
            DB::raw('CASE WHEN LENGTH(subname) > 0 THEN CONCAT(name, ' . '": "' . ', subname) ELSE name END AS name'),
            'category',
            DB::raw('0 AS subcat')
        )
        ->where('visible2', '=', 1)
        ->where(function ($query) use ($term) {
            $query->where('id', 'like', substr_replace('%%', $term, 1, 0))
            ->orWhere('name', 'like', substr_replace('%%', $term, 1, 0))
            ->orWhere('subname', 'like', substr_replace('%%', $term, 1, 0));
        })
        ->orderBy('map_main.name', 'asc')
        ->get();
    }

    public function getSearchShops(string $term)
    {
        return ShopMain::leftJoin('map_main', 'shop_main.map', '=', 'map_main.id')->select(
            DB::raw('4 AS type'),
            'shop_main.id',
            DB::raw('CONCAT(map_main.name,' . '" "' . ', shop_main.name) AS name'),
            DB::raw('0 AS category'),
            DB::raw('0 AS subcat')
        )
        ->where('map_main.visible2', '=', 1)
        ->where(function ($query) use ($term) {
            $query->where('shop_main.name', 'like', substr_replace('"%%"', $term, 2, 0))
            ->orWhereRaw('CONCAT(map_main.name,' . '" "' . ', shop_main.name) LIKE ' . substr_replace('"%%"', $term, 2, 0));
        })
        ->orderBy('name', 'asc')
        ->get();
    }

    public function getNews()
    {
        $news = News::select('topic', 'date', 'message')
        ->where('version', 2)
        ->orderBy('date', 'desc')
        ->limit(5)
        ->get();
        return $news;
    }

    public function getCategories()
    {
        return Category::select('name', 'category', 'subcat', 'type')
        ->get();
    }
}
