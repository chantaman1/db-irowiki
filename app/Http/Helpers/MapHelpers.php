<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Repositories\MapRepository;
use App\Model\MapMain;
use App\Model\BGM;

class MapHelpers
{
    private static $color = 2;

    public static function toggleColor()
    {
        if(self::$color == 1)
            self::$color = 2; 
        else
            self::$color = 1;

        return self::$color;
    }

    public static function isAggressiveMonster(int $ai)
    {
        return ($ai & 0x1 == 0x1) || ($ai & 0x2 == 0x2);
    }

    public static function isAssistiveMonster(int $ai)
    {
        return ($ai & 0x8) == 0x8;
    }
    
    public static function isCastSensorMonster(int $ai)
    {
        return ($ai & 0x10) == 0x10;
    }

    public static function canTeleport(int $flag)
    {
        return ($flag & 0x1) == 0x1;
    }

    public static function isMemoable(int $flag)
    {
        return ($flag & 0x2) == 0x2;
    }

    public static function expLosable(int $flag)
    {
        return ($flag & 0x4) == 0x4;
    }

    public static function isDeadBranchUsable(int $flag)
    {
        return ($flag & 0x8) == 0x8;
    }
    
    public static function canRespawn(int $flag)
    {
        return (($flag & 0x10) == 0x10);
    }
    
    public static function forVIP(int $flag)
    {
        return ($flag & 0x20) == 0x20;
    }

    public static function getMapName(MapMain $map)
    {
        return $map->name.($map->subName ? ": $map->subName" : "");
    }

    public static function getBGMTitle(BGM|null $bgm)
    {
        if (!is_null($bgm))
            return $bgm->track . " - " . $bgm->title;

        return "(None)";
    }

    public static function expMod($job)
    {
        // $job (true -> job exp, false -> base exp) (for job manuals)

        global $expRate, $boostManual, $VIP, $boostJob;
        // $expRate = server rates (event)
        // $boostManual = 0 none, 150 - regular, 200 - HE, 300 - 3x
        // $VIP = 0 off, 50 on
        // $boostJob = 0 off, 1 on

        $mod = (100 + $VIP) * max(100, $boostManual) / 100;

        if ($job) { $mod += 50*$boostJob; }

        return (($expRate/100) * ($mod/100));
    }

    public static function formatTime($time)
    {
        if ($time == -1) return "(Unknown)";
        
        if ($time < 60)
            return $time.($time == 1 ? " second" : " seconds");
        elseif ($time < 3600 && ($time % 60) == 0)
            return ($time / 60).($time == 60 ? " minute" : " minutes");
        elseif ($time < 86400 && ($time % 3600) == 0)
            return ($time / 3600).($time == 3600 ? " hour" : " hours");
        
        $days = 0;
        $hours = 0;
        $minutes = 0;
        
        if ($time >= 86400){
            $days = floor($time / 86400);
            $time -= $days * 86400;
        }
        if ($time >= 3600){
            $hours = floor($time / 3600);
            $time -= $hours * 3600;
        }
        if ($time >= 60){
            $minutes = floor($time / 60);
            $time -= $minutes * 60;
        }
        $seconds = $time;
        
        $timeText = "";
        
        if ($days > 0) $timeText = $days.($days == 1 ? " day" : " days");
        if ($hours > 0){
            if ($timeText) $timeText .= " ";
            $timeText .= $hours.($hours == 1 ? " hour" : " hours");
        }
        if ($minutes > 0){
            if ($timeText) $timeText .= " ";
            $timeText .= "$minutes min";
        }
        if ($seconds > 0){
            if ($timeText) $timeText .= " ";
            $timeText .= "$seconds sec";
        }
        
        return $timeText;
    }

    public static function formatRespawn($respawn)
    {
        if ($respawn == NULL) return "--";
        elseif ($respawn == -1) return "(Unknown)";
        elseif ($respawn == 1) return "(Special)";
        elseif ($respawn == 2) return "(Quest)";
        elseif ($respawn == 0) return "Instantly";
        else return "After ".formatTime($respawn);
    }
    
    public static function shortName($name, $max = 24)
    {
        if(strlen($name) > $max){
            if (strpos($name, "[") !== false || strpos($name, "(") !== false){
                $pos = strrpos(substr($name, 0, $max - 6), " ");
                if ($pos === false) $pos = $max - 6;
                
                $pos2 = strpos($name, "[");
                if ($pos2 === false) $pos2 = strpos($name, "(");
                
                $name2 = substr($name, 0, $pos)." ... ".substr($name, -(strlen($name) - $pos2));
            }
            else{
                $pos = strrpos(substr($name, 0, $max), " ");
                if ($pos === false) $pos = $max;
                
                $name2 = substr($name, 0, $pos)." ...";
            }
            
            return $name2;
        }
        else
            return $name;
    }
    public static function monsterURL($id, $name)
    {
        if(strlen($name) > 24){
            $name2 = shortName($name);
            return array($name, $name2);
        }

        return array("", $name);
    }

    public static function elementName($element)
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

    public static function raceName($race)
    {
        if ($race == 1) return "Angel";
        elseif ($race == 2) return "Brute";
        elseif ($race == 3) return "Demi-Human";
        elseif ($race == 4) return "Demon";
        elseif ($race == 5) return "Dragon";
        elseif ($race == 6) return "Fish";
        elseif ($race == 7) return "Formless";
        elseif ($race == 8) return "Insect";
        elseif ($race == 9) return "Plant";
        elseif ($race == 10) return "Undead";
        else return "??";
    }

    public static function sizeName($size)
    {
        if ($size == 1) return "Small";
        elseif ($size == 2) return "Medium";
        elseif ($size == 3) return "Large";
        else return "??";
    }
}

// return "<a href=\"/db/monster-info/$id/\" title=\"$name\">$name2</a>";
// return "<a href=\"/db/monster-info/$id/\">$name</a>";