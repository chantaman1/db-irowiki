<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ItemService;

class ItemController extends Controller
{
    protected $menuCat = null;
    protected $menuSubCat = null;

    public function InfoIndex(Request $request)
    {
        $this->menuCat = (new ItemService)->MenuCategories();
        $this->menuSubCat = (new ItemService)->MenuSubcategories();
        return view('item/item-info', [
            'menuCats' => $this->menuCat,
            'subMenuCats' => $this->menuSubCat,
            'data' => null
        ]);
    }

    public function InfoSearch(Request $request, string|int $id)
    {
        $this->menuCat = (new ItemService)->MenuCategories();
        $this->menuSubCat = (new ItemService)->MenuSubcategories();
        $itemData = (new ItemService)->itemInfo(preg_replace('/[^0-9]/', '', $id));
        return view('item/item-info', [
            'menuCats' => $this->menuCat,
            'subMenuCats' => $this->menuSubCat,
            'data' => $itemData
        ]);
    }

    public function WeaponSearch(Request $request)
    {
        $results = null;

        # inputs from URL parameter
        $inputs = array(
            "name" => $request->get('name', null),
            "effect" => $request->get('effect', null),
            "type" => $request->get('type', null),
            "job" => $request->get('job', null),
            "upgradable" => $request->get('upgradable', null),
            "breakable" => $request->get('breakable', null),
            "binding" => $request->get('binding', null),
            "sort" => $request->get('sort', null),
            "detailed" => $request->get('detailed', null),
            "atk" => $request->get('atk', null),
            "matk" => $request->get('matk', null),
            "slots" => $request->get('slots', null),
            "wepLv" => $request->get('weplv', null),
            "reqLv" => $request->get('reqlv', null),
            "element" => $request->get('element', null)
        );

        # avoid getting all the items if not needed at startup
        if(array_filter($inputs))
        {
            $results = (new ItemService)->WeaponSearch($inputs);
        }

        return view('item/weapon-search', ['inputs' => $inputs, 'data' => $results]);
    }

    public function GearSearch(Request $request)
    {
        $results = null;

        # inputs from URL parameter
        $inputs = array(
            "name" => $request->get('name', null),
            "effect" => $request->get('effect', null),
            "type" => $request->get('type', null),
            "job" => $request->get('job', null),
            "upgradable" => $request->get('upgradable', null),
            "breakable" => $request->get('breakable', null),
            "enchantable" => $request->get('enchantable', null),
            "binding" => $request->get('binding', null),
            "sort" => $request->get('sort', null),
            "detailed" => $request->get('detailed', null),
            "def" => $request->get('def', null),
            "mdef" => $request->get('mdef', null),
            "slots" => $request->get('slots', null),
            "reqLv" => $request->get('reqlv', null),
            "position" => $request->get('position', null)
        );

        # avoid getting all the items if not needed at startup
        if(array_filter($inputs))
        {
            $results = (new ItemService)->GearSearch($inputs);
        }

        return view('item/gear-search', ['inputs' => $inputs, 'data' => $results]);
    }
}
