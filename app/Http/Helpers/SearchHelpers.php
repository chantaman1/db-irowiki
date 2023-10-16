<?php

namespace App\Http\Helpers;

class SearchHelpers
{
    public static function resultUrl(int $type, int $id)
    {
        if($type == 1)
        {
            return "/db/item-info/$id/";
        }
        elseif($type == 2)
        {
            return "/db/monster-info/$id/";
        }
        elseif($type == 3)
        {
            return "/db/map-info/$id/";
        }
        elseif($type == 4)
        {
            return "/db/shop-info/$id/";
        }
    }

    public static function resultCatName(int $type, int $category, int $subcat)
    {
        if($type == 1)
        {
            return itemTypeName($category, $subcat, true);
        }
        elseif($type == 2)
        {
            return monsterTypeName($category);
        }
        elseif($type == 3)
        {
            return mapTypeName($category);
        }
        elseif($type == 4)
        {
            return "Standard";
        }
    }

    public static function resultTypeName(int $type)
    {
        if ($type == 1)
        {
            return "Item";
        }
        elseif ($type == 2)
        {
            return "Monster";
        }
        elseif ($type == 3)
        {
            return "Map";
        }
        elseif ($type == 4)
        {
            return "Shop";
        }
    }
}