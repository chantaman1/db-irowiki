<?php

namespace App\Http\Helpers;
use App\Http\Helpers\MiscHelpers;

class MonsterHelpers
{
    public static function formatTime($time){
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

    public static function formatRespawn(int|null $respawn)
    {
        if ($respawn === NULL) return "--";
        elseif ($respawn === -1) return "(Unknown)";
        elseif ($respawn === 1) return "(Special)";
        elseif ($respawn === 2) return "(Quest)";
        elseif ($respawn === 0) return "Instantly";
        else return "After ".self::formatTime($respawn);
    }

    public static function formatRespawnV2(int $respawn)
    {
        if ($respawn === -1) return "(Unknown)";
        elseif ($respawn === -10) return "(Special)";
        elseif ($respawn === -11) return "(Quest)";
        elseif ($respawn === 0) return "Instantly";
        elseif ($respawn === 1) return "After 1 minute";
        elseif ($respawn === 60) return "After 1 hour";
        elseif ($respawn === 90) return "After 1 hours and 30 minutes";
        elseif ($respawn === 133) return "After 2 hours and 13 minutes";
        elseif ($respawn < 60 || floor($respawn / 60) != ($respawn / 60)) return "After $respawn minutes";
        else return "After ".($respawn / 60)." hours";
    }

    public static function formatSpawnAmount(int $amount, int $flag)
    {
        if($amount === -1 || $flag) return "??";
        elseif($amount === 0) return "--";
        elseif($amount === -2) return "Varies";
        else return $amount;
    }

    public static function formatElementalDamage($percent){
        if ($percent > 100)
            return "<span style=\"color:#009900\">$percent%</span>";
        elseif ($percent < 100)
            return "<span style=\"color:#AA0000\">$percent%</span>";
        else
            return "$percent%";
    }

    public static function formatExperience($baseExp, $actExp){
        if ($baseExp < 0) return "??";
        
        if ($baseExp != $actExp)
            return number_format($actExp)." (".number_format($baseExp).")";
        else
            return number_format($baseExp);
    }

    public static function magicAtk($int){
        $minAtk = $int + pow(floor($int / 7), 2);
        $maxAtk = $int + pow(floor($int / 5), 2);
        
        if ($minAtk != $maxAtk)
            return number_format($minAtk)." ~ ".number_format($maxAtk);
        else
            return number_format($minAtk);
    }

    public static function vitDef($vit){
        if ($vit > 0){
            $bonus = pow(floor($vit / 20), 2) - 1;
            if ($bonus > 0)
                return " + $vit ~ ".($vit + $bonus);
            else
                return " + $vit";
        }
        else
            return "";
    }

    public static function intMDef($int, $vit){
        if (($int > 0) || ($vit > 1))
            return " + ".($int + intval($vit / 2));
        else
            return "";
    }

    public static function addSign($number){
        if ($number > 0)
            return "+$number";
        else
            return $number;
    }

    public static function defBonus(int $def, int $level, int $vit)
    {
        if($def !== -1)
        {
            if($level !== -1 && $vit !== -1)
            {
                return "$def + ".floor(($level + $vit) / 2);
            }
            else
            {
                return "$def";
            }
        }
        else
        {
            return "??";
        }
    }

    public static function defPercent(int $def)
    {
        if($def !== -1)
        {
            return sprintf("%01.2f%%", 100 - ((4000 + $def) / (4000 + ($def * 10)) * 100));
        }
        else
        {
            return "??";
        }
    }

    public static function mdefPercent(int $mdef)
    {
        if($mdef !== -1)
        {
            return sprintf("%01.2f%%", 100 - ((1000 + $mdef) / (1000 + ($mdef * 10)) * 100));
        }
        else
        {
            return "??";
        }
    }

    public static function expPerHP(int $exp, int $hp, bool $job = false)
    {
        if($exp === -1)
        {
            return "--";
        }
        else
        {
            $exp = floor($exp) * MiscHelpers::expMod($job);
            if($hp === 0)
            {
                return "0";
            }
            else
            {
                return "" . round(abs($exp) / $hp, 3);
            }
        }
    }

    public static function getModeAIList(int $level, int $mode, int $ai)
    {
        $modes = array();
        if (($mode & 0x1) != 0x1)
        {
            array_push($modes, "Immobile");
        }
        if (($mode & 0x2) != 0x2)
        {
            array_push($modes, "Doesn't Attack");
        }
        if (($mode & 0x4) == 0x4)
        {
            array_push($modes, "Always Takes 1 Damage");
        }
        if (($mode & 0x8) == 0x8)
        {
            array_push($modes, "Boss");
        }
        if (($mode & 0x10) == 0x10)
        {
            array_push($modes, "MVP");
        }
        if (($mode & 0x20) == 0x20)
        {
            array_push($modes, "Guardian");
        }
        if (($mode & 0x40) == 0x40)
        {
            array_push($modes, "Physical Damage Immunity");
        }
        if (($mode & 0x80) == 0x80)
        {
            array_push($modes, "Magical Damage Immunity");
        }
        
        if (($ai & 0x1) == 0x1)
        {
            array_push($modes, "Aggressive");
        }
        elseif (($ai & 0x2) == 0x2)
        {
            array_push($modes, "Aggressive only to Lv ".($level - 6)." and below");
        }
        else
        {
            array_push($modes, "Passive");
        }
        
        if (($ai & 0x4) == 0x4)
        {
            array_push($modes, "Looter");
        }
        
        if (($ai & 0x8) == 0x8)
        {
            array_push($modes, "Assists");
        }
        if (($ai & 0x10) == 0x10)
        {
            array_push($modes, "Cast sensor");
        }
        
        if (($ai & 0x20) == 0x20)
        {
            array_push($modes, "Changes target if attacked");
        }
        elseif (($ai & 0x40) == 0x40)
        {
            array_push($modes, "Changes target easily");
        }
        elseif (($ai & 0x80) == 0x80)
        {
            array_push($modes, "Changes target constantly");
        }
        
        if (($ai & 0x100) == 0x100)
        {
            array_push($modes, "Hyper-active");
        }

        return $modes;
    }

    public static function isCategoryInType(string|int $category, int $type)
    {
        if(is_numeric($category)){
            return ((intval($category) & pow(2, $type - 1)) === pow(2, $type - 1));
        }
        return false;
    }

    public static function getSQLMonsterSearchSort(int $sortType)
    {
        if ($sortType === 1) return "monster_stat.level";
        elseif ($sortType === 2) return "monster_main.name";
        elseif ($sortType === 3) return "size";
        elseif ($sortType === 4) return "race";
        elseif ($sortType === 5) return "eleType";
        elseif ($sortType === 6) return "hp";
        elseif ($sortType === 7) return "atkMax";
        elseif ($sortType === 8) return "def";
        elseif ($sortType === 9) return "mdef";
        elseif ($sortType === 10) return "expBase";
        elseif ($sortType === 11) return "expJob";
        elseif ($sortType === 12) return "(170 + `monster_stat`.`level` + `statDex`)";
        elseif ($sortType === 13) return "(200 + `monster_stat`.`level` + `statAgi`)";
        elseif ($sortType === 14) return "statAgi";
        elseif ($sortType === 15) return "statVit";
        elseif ($sortType === 16) return "statInt";
        elseif ($sortType === 17) return "statDex";
        elseif ($sortType === 18) return "statLuk";
        else return "monster_stat.level";
    }
}