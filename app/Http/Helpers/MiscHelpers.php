<?php

namespace App\Http\Helpers;

class MiscHelpers
{

    public static function formatTime($time)
    {
        if ($time === -1) return "(Unknown)";
        
        if ($time === 0) return "--";
        
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

    public static function sizeName($size)
    {
        if ($size == 1) return "Small";
        elseif ($size == 2) return "Medium";
        elseif ($size == 3) return "Large";
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

    public static function jobName($job)
    {
        if ($job == 1) return "Novice";
        elseif ($job == 2) return "Swordman";
        elseif ($job == 3) return "Merchant";
        elseif ($job == 4) return "Thief";
        elseif ($job == 5) return "Acolyte";
        elseif ($job == 6) return "Mage";
        elseif ($job == 7) return "Archer";
        elseif ($job == 8) return "Knight";
        elseif ($job == 9) return "Crusader";
        elseif ($job == 10) return "Blacksmith";
        elseif ($job == 11) return "Alchemist";
        elseif ($job == 12) return "Assassin";
        elseif ($job == 13) return "Rogue";
        elseif ($job == 14) return "Priest";
        elseif ($job == 15) return "Monk";
        elseif ($job == 16) return "Wizard";
        elseif ($job == 17) return "Sage";
        elseif ($job == 18) return "Hunter";
        elseif ($job == 19) return "Bard";
        elseif ($job == 20) return "Dancer";
        elseif ($job == 21) return "Super Novice";
        
        elseif ($job == 101) return "High Novice";
        elseif ($job == 102) return "High Swordman";
        elseif ($job == 103) return "High Merchant";
        elseif ($job == 104) return "High Thief";
        elseif ($job == 105) return "High Acolyte";
        elseif ($job == 106) return "High Mage";
        elseif ($job == 107) return "High Archer";
        elseif ($job == 108) return "Lord Knight";
        elseif ($job == 109) return "Paladin";
        elseif ($job == 110) return "Mastersmith";
        elseif ($job == 111) return "Biochemist";
        elseif ($job == 112) return "Assassin Cross";
        elseif ($job == 113) return "Stalker";
        elseif ($job == 114) return "High Priest";
        elseif ($job == 115) return "Champion";
        elseif ($job == 116) return "High Wizard";
        elseif ($job == 117) return "Scholar";
        elseif ($job == 118) return "Sniper";
        elseif ($job == 119) return "Minstrel";
        elseif ($job == 120) return "Gypsy";
        
        elseif ($job == 208) return "Rune Knight";
        elseif ($job == 209) return "Royal Guard";
        elseif ($job == 210) return "Mechanic";
        elseif ($job == 211) return "Genetic";
        elseif ($job == 212) return "Guillotine Cross";
        elseif ($job == 213) return "Shadow Chaser";
        elseif ($job == 214) return "Arch Bishop";
        elseif ($job == 215) return "Sura";
        elseif ($job == 216) return "Warlock";
        elseif ($job == 217) return "Sorcerer";
        elseif ($job == 218) return "Ranger";
        elseif ($job == 219) return "Minstrel";
        elseif ($job == 220) return "Wanderer";
        
        elseif ($job == 301) return "Taekwon";
        elseif ($job == 302) return "Taekwon Master";
        elseif ($job == 303) return "Soul Linker";
        elseif ($job == 304) return "Ninja";
        elseif ($job == 305) return "Gunslinger";
    }

    public static function bindingName($type)
    {
        if ($type === 0) return "Unbound";
        elseif ($type === 1) return "Account";
        elseif ($type === 2) return "Character";
        else return "??";
    }

    public static function emoteName($emote)
    {
        if (!is_numeric($emote)) return "";
        
        switch($emote){
            case 0: return "/!";
            case 1: return "/?";
            case 2: return "/ho";
            case 3: return "/lv";
            case 4: return "/swt";
            case 5: return "/ic";
            case 6: return "/an";
            case 7: return "/ag";
            case 8: return "/$";
            case 9: return "/...";
            case 10: return "/gawi";
            case 11: return "/bawi";
            case 12: return "/bo";
            case 14: return "/lv2";
            case 15: return "/thx";
            case 16: return "/wah";
            case 17: return "/sry";
            case 18: return "/heh";
            case 19: return "/swt2";
            case 20: return "/hmm";
            case 21: return "/no1";
            case 22: return "/??";
            case 23: return "/omg";
            case 24: return "/oh";
            case 25: return "/x";
            case 26: return "/hlp";
            case 27: return "/go";
            case 28: return "/sob";
            case 29: return "/gg";
            case 30: return "/kis";
            case 31: return "/kis2";
            case 32: return "/pif";
            case 33: return "/ok";
            case 36: return "/bzz";
            case 37: return "/rice";
            case 38: return "/awsm";
            case 39: return "/meh";
            case 40: return "/shy";
            case 41: return "/pat";
            case 42: return "/mp";
            case 43: return "/slur";
            case 44: return "/com";
            case 45: return "/yawn";
            case 46: return "/grat";
            case 47: return "/hp";
            case 52: return "/fsh";
            case 53: return "/spin";
            case 54: return "/sigh";
            case 55: return "/dum";
            case 56: return "/crwd";
            case 57: return "/desp";
            case 58: return "/dice";
        }
    }

    public static function weaponSizeMod($class, $size)
    {
        $sizes = array();
        $sizes[0] = array(100, 100, 100);	// Fist
        $sizes[1] = array(75, 100, 75);		// 1H Sword
        $sizes[2] = array(75, 75, 100);		// 2H Sword
        $sizes[3] = array(75, 75, 100);		// 1H Spear
        $sizes[4] = array(75, 75, 100);		// 2H Spear
        $sizes[5] = array(50, 75, 100);		// 1H Axe
        $sizes[6] = array(50, 75, 100);		// 2H Axe
        $sizes[7] = array(100, 75, 50);		// Knife
        $sizes[8] = array(75, 100, 100);	// Mace
        $sizes[9] = array(100, 100, 75);	// Claw
        $sizes[10] = array(100, 100, 50);	// Book
        $sizes[11] = array(75, 100, 75);	// Katar
        $sizes[12] = array(100, 75, 75);	// Fuuma
        $sizes[13] = array(100, 100, 75);	// Bow
        $sizes[14] = array(100, 100, 100);	// Pistol
        $sizes[15] = array(100, 100, 100);	// Rifle
        $sizes[16] = array(100, 100, 100);	// Shotgun
        $sizes[17] = array(100, 100, 100);	// Gatling Gun
        $sizes[18] = array(100, 100, 100);	// Grenade Launcher
        $sizes[19] = array(75, 100, 75);	// Instrument
        $sizes[20] = array(75, 100, 50);	// Whip
        $sizes[21] = array(100, 100, 100);	// 1H Staff
        $sizes[22] = array(100, 100, 100);	// 2H Staff
        
        return $sizes[$class][$size - 1];
    }

    public static function expMod($job)
    {
        // $job (true -> job exp, false -> base exp) (for job manuals)
    
        $expRate = 100;
        $boostManual = 0;
        $VIP = 0;
        $boostJob = 0;
    
        // $expRate = server rates (event)
        // $boostManual = 0 none, 150 - regular, 200 - HE, 300 - 3x
        // $VIP = 0 off, 50 on
        // $boostJob = 0 off, 1 on
    
        $mod = (100 + $VIP) * max(100, $boostManual) / 100;
    
        if ($job) { $mod += 50 * $boostJob; }
    
        return (($expRate / 100) * ($mod / 100));
    }

    public static function dropRate($rate, $incBoost)
    {
        // $rate = natural item rate
        // $incBoost (true -> regular drop, false -> mvp reward item)
    
        $dropRate = 100;
        $boostGum = 0;
        $VIP = 0;

        // $dropRate = server rates (event)
        // $boostGum = 0 none, 200 regular, 300 HE
        // $VIP = 0 off, 50 on
    
        if ($boostGum) { $gum = $boostGum + $VIP; }
        else if ($VIP) { $gum = 100 + $VIP; }
        else { $gum = 100; }
    
        if ($rate == -1) return "??";
    
        if ($incBoost){
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

    public static function getSortType(string|null $sort)
    {
        $defaultValue = "1";

        if(!is_null($sort))
        {
            try
            {
                list($sortType, $sortDir) = explode(",", $sort);
                if(is_numeric($sortType) && intval($sortType) >= 1 && intval($sortType) <= 20)
                {
                    return $sortType;
                }
                else
                {
                    return $defaultValue;
                }
            }
            catch(\Exception $e)
            {
                return $defaultValue;
            }
        }
        else
        {
            return $defaultValue;
        }
    }
    
    public static function getSortDir(string|null $sort)
    {
        $defaultValue = "1";

        if(!is_null($sort))
        {
            try
            {
                list($sortType, $sortDir) = explode(",", $sort);
                if(is_numeric($sortDir) && intval($sortDir) >= 1 && intval($sortDir) <= 2)
                {
                    return $sortDir;
                }
                else
                {
                    return $defaultValue;
                }
            }
            catch(\Exception $e)
            {
                return $defaultValue;
            }
        }
        else
        {
            return $defaultValue;
        }
    }

    public static function getOperationType(string|null $operation)
    {
        $defaultValue = "1";

        if(!is_null($operation))
        {
            try
            {
                list($opType, $opt1, $op2) = explode(",", $operation);
                if(is_numeric($opType) && intval($opType) >= 1 && intval($opType) <= 6)
                {
                    return $opType;
                }
                else
                {
                    return $defaultValue;
                }
            }
            catch(\Exception $e)
            {
                return $defaultValue;
            }
        }
        else
        {
            return $defaultValue;
        }
    }

    public static function getDataValue(string|null $data, int $pos)
    {
        $unknown = "";
        if(!is_null($data))
        {
            try
            {
                list($opType, $val1, $val2) = explode(",", $data);
                error_log("OP: " . $opType ." VAL1: ". $val1 ." VAL2: ". $val2);
                if($pos === 0 && !is_null($val1))
                {
                    return $val1;
                }
                elseif($pos === 1 && !is_null($val2))
                {
                    return $val2;
                }
                else
                {
                    return $unknown;
                }
            }
            catch(\Exception $e)
            {
                return $unknown;
            }
        }
        else
        {
            return $unknown;
        }
    }

    public static function getSQLOperationSymbol(int $opType)
    {
        if ($opType === 1) return "=";
        elseif ($opType === 2) return ">";
        elseif ($opType === 3) return "<";
        elseif ($opType === 4) return ">=";
        elseif ($opType === 5) return "<=";
    }
}