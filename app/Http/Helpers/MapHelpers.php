<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Repositories\MapRepository;
use App\Model\MapMain;
use App\Model\BGM;
use App\Http\Helpers\MiscHelpers;

class MapHelpers
{
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

    public static function formatRespawn($respawn)
    {
        if ($respawn === NULL) return "--";
        elseif ($respawn === -1) return "(Unknown)";
        elseif ($respawn === 1) return "(Special)";
        elseif ($respawn === 2) return "(Quest)";
        elseif ($respawn === 0) return "Instantly";
        else return "After ". MiscHelpers::formatTime($respawn);
    }
    
    public static function shortName($name, $max = 24)
    {
        if(strlen($name) <= $max)
            return $name;

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

    public static function shortenMonsterName($name)
    {
        if(strlen($name) <= 24)
            return array("title" => "", "name" => $name);

        $name2 = self::shortName($name);
        return array("title" => $name, "name" => $name2);
    }
}