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
        return view('item/info', [
            'menuCats' => $this->menuCat,
            'subMenuCats' => $this->menuSubCat,
            'data' => null
        ]);
    }

    public function InfoSearch(Request $request, int $id)
    {
        $itemData = (new ItemRepository)->itemInfo($id);
        #dd($itemData);
        return view('item/info', [
            'menuCats' => $this->menuCat,
            'subMenuCats' => $this->menuSubCat,
            'data' => $itemData
        ]);
    }
}
