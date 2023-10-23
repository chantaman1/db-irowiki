<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Repositories\ItemRepository;

class ItemHelpers
{
    public static function formatSpecial(string $special)
    {
        $special = preg_replace("/\[race=(.*?)]/s", "[\\1]", $special);
        $special = preg_replace("/\[element=(.*?)]/s", "[\\1]", $special);
        $special = preg_replace("/\[size=(.*?)]/s", "[\\1]", $special);
        $special = preg_replace("/\[status=(.*?)]/s", "[\\1]", $special);

        while (preg_match("/\[item=(.*?)]/s", $special, $matches))
        {
            list($text, $id) = $matches;
            $item = (new ItemRepository)->getItemNameById($id);
            $special = str_replace($text, "<a class=\"medium\" href=\"/db/item-info/$id/\">$item->name</a>", $special);
        }

        while (preg_match("/\[monster=(.*?)]/s", $special, $matches))
        {
            list($text, $id) = $matches;
            $monster = (new ItemRepository)->getMonsterNameById($id);
            $special = str_replace($text, "<a class=\"medium\" href=\"/db/monster-info/$id/\">$monster->name</a>", $special);
        }

        while (preg_match("/\[map=([a-z0-9_]+)]/s", $special, $matches) || preg_match("/\[map=([a-z0-9_]+),([0-9]+),([0-9]+)]/s", $special, $matches))
        {

            list($text, $id, $coorX, $coorY) = $matches;
            $map = (new ItemRepository)->getMapNameById($id);
            $special = str_replace($text, "<a class=\"medium\" href=\"/db/map-info/$id/\">$map->name</a>" .
                ($coorX ? " ($coorX, $coorY)" : ""), $special);
        }

        while (preg_match("/\[skill=([0-9]+)]/s", $special, $matches))
        {
            list($text, $id) = $matches;
            $skill = (new ItemRepository)->getSkillNameById($id);
            $href = str_replace(" ", "_", $skill->name);
            $special = str_replace($text, '<a href="https://irowiki.org/wiki/' . $href . '">[' . $skill->name . ']</a>', $special);
        }

        while (preg_match("/\[skill=([0-9]+),([0-9]+)]/s", $special, $matches))
        {
            list($text, $id, $level) = $matches;
            $skill = (new ItemRepository)->getSkillNameById($id);
            $href = str_replace(" ", "_", $skill->name);
            $special = str_replace($text, '<a href="https://irowiki.org/wiki/' . $href . '">[' . $skill->name . ']</a> Lv .' . $level, $special);
        }

        while (preg_match("/\[skill=([0-9]+),([0-9]+),([0-9]+)]/s", $special, $matches))
        {
            list($text, $id, $level, $altLv) = $matches;
            $skill = (new ItemRepository)->getSkillNameById($id);
            $href = str_replace(" ", "_", $skill->name);
            $special = str_replace($text, '<a href="https://irowiki.org/wiki/' . $href . '">[' . $skill->name . ']</a> Lv .' . $level . ($altLv ? ", or Lv $altLv if learned by the user," : ""), $special);
        }

        return $special;
    }

    public static function getItemTypeName(int $cat, int $subcat = 0, bool $full = false)
    {
        return (new ItemRepository)->getItemTypeName($cat, $subcat, $full);
    }

    public static function getItemsUrl(Collection $items, int $setType)
    {
        $output = " ";
        $itemsName = (new ItemRepository)->getItemsName($items);
        if (count($itemsName) > 0) {
            while ($item = current($itemsName)) {
                if (next($itemsName)) {
                    if($setType === 1)
                    {
                        $output .= "<a class=\"medium\" href=\"/db/item-info/$item->id/\">$item->name</a>, ";
                    }
                    elseif($setType === 2)
                    {
                        $output .= "<a class=\"medium\" href=\"/db/item-info/$item->id/\">$item->name</a> or ";
                    }
                    elseif($setType === 3)
                    {
                        $output = "<a class=\"medium\" href=\"/db/item-info/$item->id/\">$item->name</a>";
                    }
                } else {
                    $output .= "<a class=\"medium\" href=\"/db/item-info/$item->id/\">$item->name</a>";
                }
            }
        }
        return $output;
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

    public static function getWeaponSizeMod(int $class, $size)
    {
        $sizes = array();
        $sizes[0] = array(100, 100, 100);    // Fist
        $sizes[1] = array(75, 100, 75);        // 1H Sword
        $sizes[2] = array(75, 75, 100);        // 2H Sword
        $sizes[3] = array(75, 75, 100);        // 1H Spear
        $sizes[4] = array(75, 75, 100);        // 2H Spear
        $sizes[5] = array(50, 75, 100);        // 1H Axe
        $sizes[6] = array(50, 75, 100);        // 2H Axe
        $sizes[7] = array(100, 75, 50);        // Knife
        $sizes[8] = array(75, 100, 100);    // Mace
        $sizes[9] = array(100, 100, 75);    // Claw
        $sizes[10] = array(100, 100, 50);    // Book
        $sizes[11] = array(75, 100, 75);    // Katar
        $sizes[12] = array(100, 75, 75);    // Fuuma
        $sizes[13] = array(100, 100, 75);    // Bow
        $sizes[14] = array(100, 100, 100);    // Pistol
        $sizes[15] = array(100, 100, 100);    // Rifle
        $sizes[16] = array(100, 100, 100);    // Shotgun
        $sizes[17] = array(100, 100, 100);    // Gatling Gun
        $sizes[18] = array(100, 100, 100);    // Grenade Launcher
        $sizes[19] = array(75, 100, 75);    // Instrument
        $sizes[20] = array(75, 100, 50);    // Whip
        $sizes[21] = array(100, 100, 100);    // 1H Staff
        $sizes[22] = array(100, 100, 100);    // 2H Staff

        return $sizes[$class][$size - 1];
    }

    public static function getDiscountPrice(int $price)
    {
        $dcLevel = 10;

        if (!$dcLevel) return "";
        if ($price == -1) return "(?? Z)";
        if ($price == 0) return "(0 Z)";

        if (($dcLevel >= 1) && ($dcLevel <= 9))
            $price = floor((1 - (5 + 2 * $dcLevel) / 100) * $price);
        else if ($dcLevel == 10)
            $price = floor(0.76 * $price);

        if ($price < 1) $price = 1;

        return "(" . number_format($price) . " Z)";
    }

    public static function getOverchargePrice(int $price)
    {
        $dcLevel = 10;
        $ocLevel = 10;

        if (!$ocLevel || $price <= 0) return "";

        if (($ocLevel >= 1) && ($ocLevel <= 9))
            $price = floor((1 + (5 + 2 * $dcLevel) / 100) * $price);
        else if ($ocLevel == 10)
            $price = floor(1.24 * $price);

        if ($price < 1) $price = 1;

        return "(" . number_format($price) . " Z)";
    }

    public static function getDropRate(int $rate, bool $incBoost)
    {
        // $rate = natural item rate
        // $incBoost (true -> regular drop, false -> mvp reward item)

        $dropRate = 100;
        $boostGum = 0;
        $VIP = 0;
        // $dropRate = server rates (event)
        // $boostGum = 0 none, 200 regular, 300 HE
        // $VIP = 0 off, 50 on

        if ($boostGum) {
            $gum = $boostGum + $VIP;
        } else if ($VIP) {
            $gum = 100 + $VIP;
        } else {
            $gum = 100;
        }

        if ($rate == -1) return "??";

        if ($incBoost) {
            $rate = round($rate * ($dropRate / 100));

            if ($gum && $rate < 9000) {
                $rate = round($rate * ($gum / 100));
                if ($rate > 9000) $rate = 9000;
            }
        }

        $rate = round((($rate + 1) / 10001) * 10000, 5);
        if ($rate > 10000) $rate = 10000;

        $rate = sprintf("%01.2f%%", $rate / 100);

        if (substr($rate, -4, 3) == ".01")
            $rate = str_replace(".01", ".00", $rate);

        return $rate;
    }

    public static function getItemStat(string $special, bool $name = false)
    {
        if (strpos($special, "+") !== FALSE) {
            list($statName, $statValue) = preg_split("~ \+~", $special);
            if ($name) {
                return $statName;
            } else {
                return "+$statValue";
            }
        } else if (strpos($special, ":") !== FALSE) {
            list($statName, $statValue) = preg_split("~: ~", $special);
            if ($name) {
                return $statName;
            } else {
                return "$statValue";
            }
        } else {
            list($statName, $statValue) = preg_split("~ \-~", $special);
            if ($name) {
                return $statName;
            } else {
                return "-$statValue";
            }
        }
    }

    public static function getMonsterSpawn(int $id, array $spawns)
    {
        if (!is_null($spawns)) {
            foreach ($spawns as $spawn) {
                if ($spawn->monster === $id) {
                    if ($spawn->amount >= 0) {
                        return ($spawn->amount > 0 && !$spawn->flag ? "$spawn->amount at " : "") . "<a href=\"/db/map-info/$spawn->id/\">$spawn->name</a>";
                    } else {
                        return "(Unknown)";
                    }
                }
            }
        }
        return "(Doesn't spawn on any map)";
    }

    public static function canJobEquip(int $job, int $reqlv, int $jobId, int $jobGroup)
    {
        if ($jobGroup === 1 || $jobGroup === 6) {
            if (($job & 0x1) !== 0x1 && ($job & pow(2, $jobId + 1)) === pow(2, $jobId + 1) && $reqlv < 100 && $jobGroup === 1) return true;
            elseif (($job & pow(2, $jobId + 21)) === pow(2, $jobId + 21) && $jobGroup === 6) return true;
            else return false;
        } else {
            if (($job & 0x1) !== 0x1 && ($job & 0x2) !== 0x2 && ($job & pow(2, $jobId + 1)) === pow(2, $jobId + 1) && $reqlv < 100 && $jobGroup === 2) return true;
            elseif (($job & 0x2) !== 0x2 && ($job & pow(2, $jobId + 1)) === pow(2, $jobId + 1) && $reqlv < 100 && $jobGroup === 3) return true;
            elseif (($job & pow(2, $jobId + 1)) === pow(2, $jobId + 1) && $reqlv <= 200 && $jobGroup === 4) return true;
            elseif (($job & pow(2, $jobId + 1)) === pow(2, $jobId + 1) && $jobGroup === 5) return true;
            else return false;
        }
    }
}
