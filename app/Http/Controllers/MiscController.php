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

    private function Response($data)
    {
        return response($data, 200)
            ->header("Content-type", "text/javascript; charset=UTF-8")
            ->header("Expires", gmdate("M j G:i", time() + 300).":00 GMT");
    }

    public function ArrowCraft(Request $request)
    {
        if ($request->has('materials'))
        {
            $materials = (new MiscService)->MaterialsFromArrow((int) $request->materials);
            return $this->Response($materials, 200);
        }
        else if($request->has('craft'))
        {
            $arrows = (new MiscService)->ArrowsFromItem((int) $request->craft);
            return $this->Response($arrows, 200);
        }
        else if($request->has('drops'))
        {
            $monsters = (new MiscService)->MonstersFromItem((int) $request->drops);
            return $this->Response($monsters, 200);
        }
        else{
            $arrowCategories = (new MiscService)->ArrowMenu();
            return view('misc/arrow-craft', [
                'arrowCategories' => $arrowCategories,
            ]);
        }
    }
}
