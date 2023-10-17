<?php

namespace App\Http\Repositories;

use App\Model\Category;

class ItemRepository
{
    public function getItemMenuCat()
    {
        $itemMenuCat = Category::select('name', 'category', 'subcat')
        ->where('type', '=', 'item')
        ->where('subcat', '=', 0)
        ->where('version', '!=', 3)
        ->orderBy('category', 'asc')
        ->get();
        return $itemMenuCat;
    }

    public function getSubMenuCat()
    {
        $itemSubMenuCat = Category::select('name', 'category', 'subcat')
        ->where('type', '=', 'item')
        ->where('subcat', '!=', 0)
        ->where('version', '!=', 3)
        ->orderBy('category', 'asc')
        ->get();
        return $itemSubMenuCat;
    }
}
