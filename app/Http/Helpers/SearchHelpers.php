<?php

namespace App\Http\Helpers;
use Illuminate\Database\Eloquent\Collection as Collection;

class SearchHelpers
{
    public static function resultUrl(int $type, string|int $id)
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

    public static function resultCatName(int $type, int $category, int $subcat, Collection $arr)
    {
        if($type == 1)
        {
            if($subcat == 0)
            {
                foreach($arr as $item)
                {
                    if($item->type == "item" && $item->category == $category && $item->subcat == $subcat)
                    {
                        return $item->name;
                    }
                }
            }
            else
            {
                $left = "Unknown";
                $right = "Unknown";
                foreach($arr as $item)
                {
                    if($item->type == "item" && $item->category == $category && $item->subcat == 0)
                    {
                        $left = $item->name;
                        break;
                    }
                }
                foreach($arr as $item)
                {
                    if($item->category == $category && $item->subcat == $subcat)
                    {
                        $right = $item->name;
                        break;
                    }
                }
                return $left . ': ' . $right;
            }
        }
        elseif($type == 2)
        {
            foreach($arr as $item)
            {
                if($item->type == "monster" && $item->category == $category)
                {
                    return $item->name;
                }
            }
        }
        elseif($type == 3)
        {
            foreach($arr as $item)
            {
                if($item->type == "map" && $item->category == $category)
                {
                    return $item->name;
                }
            }
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
