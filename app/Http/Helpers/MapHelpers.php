<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Repositories\MapRepository;
use App\Model\MapMain;
use App\Model\BGM;

class MapHelpers
{
    public static function canTeleport(int $flag)
    {
        if (($flag & 0x1) == 0x1)
            return true;  

        return false;
    }

    public static function isMemoable(int $flag)
    {
        if (($flag & 0x2) == 0x2)
            return true; 

        return false;
    }

    public static function expLosable(int $flag)
    {
        if (($flag & 0x4) == 0x4)
            return true;

        return false;
    }

    public static function isDeadBranchUsable(int $flag)
    {
        if (($flag & 0x8) == 0x8)
            return true;

        return false;
    }
    
    public static function canRespawn(int $flag)
    {
        if (($flag & 0x10) == 0x10)
            return false;

        return true;
    }
    
    public static function forVIP(int $flag)
    {
        if (($flag & 0x20) == 0x20)
            return true;

        return false;
    }

    public static function getMapName(MapMain $map)
    {
        return $map->name.($map->subName ? ": $map->subName" : "");
    }

    public static function getBGMTitle(BGM $bgm)
    {
        if (!is_null($bgm))
            return $bgm->track . " - " . $bgm->title;

        return "(None)";
    }
}