<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ItemRepository;

class ItemController extends Controller
{
    protected $menuCat = null;
    protected $menuSubCat = null;

    public static function onMenuUpdate(Object $data)
    {
        dd($data);
    }

    public function InfoIndex(Request $request)
    {
        $menuCat = (new ItemRepository)->getItemMenuCat();
        $menuSubCat = (new ItemRepository)->getSubMenuCat();
        return view('item/info', ['menuCats' => $menuCat, 'subMenuCats' => $menuSubCat]);
    }

    public function InfoSearch(Request $request, int $id)
    {
        return view('item/info');
    }
}
