<?php

namespace App\Http\Services;

use App\Http\Repositories\MapRepository;
use App\Http\Helpers\MapHelpers;
use App\Http\Helpers\MiscHelpers;

const DOUBLE_QUESTION_MARK = "??";
const DOUBLE_HYPHEN = "--";
const UNKNOWN = "(Unknown)";

class MapService
{
    public function MenuCategories(int|null $id = null)
    {
        return (new MapRepository)->getMenuCategory($id);
    }

    public function MenuData(int|null $id = null)
    {
        return (new MapRepository)->getMenuData($id);
    }

    public function MapInfo(int|string|null $id = null)
    {
        $mapRepository = new MapRepository();
        
        $output = array(
            "map" => null,
            "mapType" => null,
            "mapShops" => null,
            "mapBGM" => null,
            "zoneInfo" => UNKNOWN,
            "spawnList" => null,
        );

        if (is_null($id)) return "";

        $map = $mapRepository->getMapMainByID($id);
        
        $output["map"] = $map;
        
        if($map === null) return $output;
        
        // *************************************************
        //      Game Region logic not implemented yet!
        // *************************************************
        
        $bgm = $mapRepository->getMapBGM($map->bgm);
        if ($bgm !== null)
            $output["mapBGM"] = $bgm;
    
        $mapType = $mapRepository->getMapType($map->category);
        if($mapType !== null)
            $output['mapType'] = $mapType;


        $mapShops = $mapRepository->getShopMainList($id);
        
        if(count($mapShops) > 0)
            $output["mapShops"] = $mapShops;

        $spawnListGroupList = $mapRepository->getSpawnListGroupList($map->id);
        if (count($spawnListGroupList) > 0)
        {
            $grpList = array();
            foreach($spawnListGroupList as $spawnListGroup) 
            {
                array_push(
                    $grpList, 
                    array(
                        "grpID" => $spawnListGroup->grp, 
                        "grpName" => $spawnListGroup->name, 
                        "grpNote" => $spawnListGroup->note, 
                        "grpCon" => "grp=$spawnListGroup->grp"
                    )
                );
            }
        } 
        else
        {
            $grpList = array(
                array(
                    "grpID" => 0, 
                    "grpName" => null, 
                    "grpNote" => null, 
                    "grpCon" => "category!=2 AND category!=5"
                ),
                array(
                    "grpID" => 0, 
                    "grpName" => "MVP", 
                    "grpNote" => null, 
                    "grpCon" => "category=2"
                ),
                array(
                    "grpID" => 0, 
                    "grpName" => "Plant", 
                    "grpNote" => null, 
                    "grpCon" => "category=5"
                )
            );
        }

        $groupList = array();
        foreach($grpList as $data)
        {
            $spawnList = $mapRepository->getSpawnList($map->id, $data['grpCon']);
            if(count($spawnList) > 0)
            {
                $spawns = array();
                foreach($spawnList as $monster)
                {
                    $spawnCount = $mapRepository->getSpawnCount($map->id, $data['grpID'], $monster->id);
                    
                    $monsterInfo = array();
    
                    $monsterInfo['rowSpan'] = $spawnCount > 0 ? ("rowspan=" . $spawnCount) : "";
                    $monsterInfo['mob'] = $monster;
                    
                    $amount = DOUBLE_HYPHEN;
                    $respawn = DOUBLE_HYPHEN;
                    if($monster->amount != 0)
                    {
                        if ($monster->amount == null || $monster->flag) $amount = DOUBLE_QUESTION_MARK;
                        else if ($monster->amount == -2) $amount = "Varies";
                        else $amount = $monster->amount;
                        $respawn = MapHelpers::formatRespawn($monster->time);
                    }
    
                    $monsterInfo['amount'] = $amount;
                    $monsterInfo['respawn'] = $respawn;
                    
                    $monsterInfo['expBase'] = 0;
                    $monsterInfo['expJob'] = 0;
                    if ($monster->expBase > 0){
                        $monsterInfo['expBase'] = floor( $monster->expBase * MiscHelpers::expMod(FALSE) );
                    }
                    
                    if ($monster->expJob > 0){
                        $monsterInfo['expJob'] = floor( $monster->expJob * MiscHelpers::expMod(TRUE) );
                    }
    
                    $flee = DOUBLE_HYPHEN;
                    if (($monster->mode & 0x2) == 0x2){
                        $flee = DOUBLE_QUESTION_MARK;
                        if ($monster->level != -1 && $monster->statDex != -1)
                            $flee = 170 + $monster->level + $monster->statDex;
                    }
                    
                    $monsterInfo['flee'] = $flee;
    
                    $monsterInfo['hit'] = DOUBLE_QUESTION_MARK;
                    if ($monster->level != -1 && $monster->statAgi != -1)
                        $monsterInfo['hit'] = 200 + $monster->level + $monster->statAgi;
    
                    $monsterInfo['level'] = DOUBLE_QUESTION_MARK;
                    if($monster->level != -1)
                        $monsterInfo['level'] = $monster->level;
                    
                    $monsterInfo['hp'] = DOUBLE_QUESTION_MARK;
                    if($monster->hp != -1)
                        $monsterInfo['hp'] = number_format($monster->hp);
    
                    $monsterInfo['eleType'] = DOUBLE_QUESTION_MARK;
                    if($monster->eleType != -1)
                        $monsterInfo['eleType'] = MiscHelpers::elementName($monster->eleType)." $monster->eleLvl";
                    
                    $monsterInfo['race'] = DOUBLE_QUESTION_MARK;
                    if($monster->race != -1)
                        $monsterInfo['race'] = MiscHelpers::raceName($monster->race);
                    
                    $monsterInfo['size'] = DOUBLE_QUESTION_MARK;
                    if($monster->size != -1)
                        $monsterInfo['size'] = MiscHelpers::sizeName($monster->size);
    
                    $monsterInfo['def'] = DOUBLE_QUESTION_MARK;
                    if($monster->def != -1)
                        $monsterInfo['def'] = $monster->def;
    
                    $monsterInfo['mdef'] = DOUBLE_QUESTION_MARK;
                    if($monster->mdef != -1)
                        $monsterInfo['mdef'] = $monster->mdef;
    
    
                    $extraMonsterInfo = array();
                    if ($spawnCount > 1)
                    {
                        $extraSpawnList = $mapRepository->getExtraSpawnList($map->id, $data['grpID'], $monster->id, $monster->time);
                        
                        foreach($extraSpawnList as $extraMonster)
                        {
                            $amount2 = DOUBLE_QUESTION_MARK;
                            $respawn = DOUBLE_QUESTION_MARK;
                            if ($extraMonster->amount2 != 0)
                            {
                                if($extraMonster->amount2 || $extraMonster->flag) 
                                    $amount2 = DOUBLE_QUESTION_MARK;
                                $respawn = MapHelpers::formatRespawn($extraMonster->time2);
                            }
                            array_push(
                                $extraMonsterInfo,
                                array(
                                    "amount" => $amount2,
                                    "respawn" => $respawn,
                                )
                            );
                        }
                    }
                    
                    $monsterInfo['extraMonsterInfo'] = $extraMonsterInfo;
                    
                    array_push($spawns, $monsterInfo);
                }

                array_push(
                    $groupList, 
                    array(
                        "groupName" => $data['grpName'].($data['grpNote'] ? ' ($data["grpNote"])' : ''),
                        "spawns" => $spawns
                    )
                );
            }
            $output['groupList'] = $groupList;
        }

        return $output;
    }

    public function World1Info()
    {
        $mapRepository = new MapRepository();
        
        $worlds = $mapRepository->getWorld1();
        
        return self::WorldData($mapRepository, $worlds);
    }

    public function World2Info()
    {
        $mapRepository = new MapRepository();
        
        $worlds = $mapRepository->getWorld2();
        
        return self::WorldData($mapRepository, $worlds);
    }

    public function WorldData(MapRepository $mapRepository, $worlds)
    {
        $worldData = [];

        foreach($worlds as $world)
        {
            $worldSpawnData = $mapRepository->getWorldSpawnData($world->id);

            $spawnDataCount = count($worldSpawnData);

            $spawnList = array();
            if($spawnDataCount)
            {
                if($spawnDataCount <= 30)
                {
                    foreach($worldSpawnData as $spawn)
                    {
                        if ($spawn->flag) $spawn->amount = -1;
                        array_push($spawnList, array(
                            "name" => $spawn->name2,
                            "amount" => $spawn->amount    
                        ));
                    }
                }
                else
                {
                    array_push($spawnList, array(
                        "name" => "",
                        "amount" => 0  
                    ));
                }
            }

            $worldData[$world->id] = array(
                "id" => $world->id,
                "name" => $world->name,
                "subname" => $world->subname,
                "spawn" => $spawnList
            );
        }

        return $worldData;
    }
}