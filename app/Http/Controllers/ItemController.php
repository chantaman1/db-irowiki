<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ItemRepository;

class ItemController extends Controller
{
    protected $menuCat = null;
    protected $menuSubCat = null;

    public function InfoIndex(Request $request)
    {
        $this->menuCat = (new ItemRepository)->getItemMenuCat();
        $this->menuSubCat = (new ItemRepository)->getSubMenuCat();
        return view('item/item-info', [
            'menuCats' => $this->menuCat,
            'subMenuCats' => $this->menuSubCat,
            'data' => null
        ]);
    }

    public function InfoSearch(Request $request, string|int $id)
    {
        $this->menuCat = (new ItemRepository)->getItemMenuCat();
        $this->menuSubCat = (new ItemRepository)->getSubMenuCat();
        $itemData = (new ItemRepository)->itemInfo(preg_replace('/[^0-9]/', '', $id));
        return view('item/item-info', [
            'menuCats' => $this->menuCat,
            'subMenuCats' => $this->menuSubCat,
            'data' => $itemData
        ]);
    }

    public function WeaponSearch(Request $request)
    {
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

        $results = (new ItemRepository)->WeaponSearch($inputs);
        #dd($results);
        return view('item/weapon-search', ['data' => $results]);
    }
}
