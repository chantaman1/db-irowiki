<?php

namespace App\Http\Helpers;

use App\Http\Repositories\ItemRepository;

class ItemHelpers
{
    public static function getItemTypeName(int $cat, int $subcat = 0, bool $full = false)
    {
        return (new ItemRepository)->getItemTypeName($cat, $subcat, $full);
    }

    public static function getElementName(int $element)
    {
        if ($element == 0) return "(None)";
        elseif ($element == 1) return "Neutral";
        elseif ($element == 2) return "Fire";
        elseif ($element == 3) return "Earth";
        elseif ($element == 4) return "Wind";
        elseif ($element == 5) return "Water";
        elseif ($element == 6) return "Poison";
        elseif ($element == 7) return "Holy";
        elseif ($element == 8) return "Shadow";
        elseif ($element == 9) return "Ghost";
        elseif ($element == 10) return "Undead";
        else return "??";
    }

    public static function getBindingName(int $binding)
    {
        if ($binding == 1) return "Account";
        elseif ($binding == 2) return "Character";
        else return "??";
    }

    public static function getItemStat(string $special, bool $name = false)
    {
        if (strpos($special, "+") !== FALSE){
			list($statName, $statValue) = preg_split("~ \+~", $special);
            if ($name)
            {
                return $statName;
            }
            else
            {
                return "+$statValue";
            }
		}
		else if (strpos($special, ":") !== FALSE){
			list($statName, $statValue) = preg_split("~: ~", $special);
            if ($name)
            {
                return $statName;
            }
            else
            {
                return "$statValue";
            }
		}
		else {
			list($statName, $statValue) = preg_split("~ \-~", $special);
			if ($name)
            {
                return $statName;
            }
            else
            {
                return "-$statValue";
            }
		}
    }
}
