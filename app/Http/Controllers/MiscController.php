<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Services\MiscService;

class MiscController extends Controller
{
    public function ShopInfo(Request $request)
    {
        $menuCategories = (new MiscService)->MenuCategories();
        $menuShops = (new MiscService)->MenuShops();

        return view('misc/shop-info', [
            'menuCategories' => $menuCategories,
            'menuData' => $menuShops,
            'data' => null
        ]);
    }

    public function ShopSearch(Request $request, string $id)
    {
        $menuCategories = (new MiscService)->MenuCategories();
        $menuShops = (new MiscService)->MenuShops();
        $shopData = (new MiscService)->ShopInfo($id);

        return view('misc/shop-info', [
            'menuCategories' => $menuCategories,
            'menuData' => $menuShops,
            'data' => $shopData
        ]);
    }

    public function TreasureDrops(Request $request)
    {
        $realmMenu = (new MiscService)->RealmMenu();

        return view('misc/treasure-drops', [
            'realmMenu' => $realmMenu,
            'data' => null
        ]);
    }

    public function TreasureDropSearch(Request $request, string $id)
    {
        $realmMenu = (new MiscService)->RealmMenu();
        $data = (new MiscService)->RealmInfo($id);

        return view('misc/treasure-drops', [
            'realmMenu' => $realmMenu,
            'data' => $data
        ]);
    }
}
