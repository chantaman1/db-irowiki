<?php

namespace App\Http\Services;

use App\Http\Repositories\MapRepository;
use App\Http\Helpers\MapHelpers;

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

    public function mapInfo(int|string|null $id = null)
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
        
        // Game Region logic not implemented yet!
        
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
                    $monsterInfo['ai'] = $monster->ai;
                    $monsterInfo['id'] = $monster->id;
                    $monsterInfo['name'] = $monster->name2;
                    
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
    
                    if ($monster->expBase > 0){
                        $monsterInfo['expBase'] = floor($monster->expBase*MapHelpers::expMod(FALSE));
                    }
                    
                    if ($monster->expJob > 0){
                        $monsterInfo['expJob'] = floor($monster->expJob*MapHelpers::expMod(TRUE));
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
                        $monsterInfo['eleType'] = MapHelpers::elementName($monster->eleType)." $monster->eleLvl";
                    
                    $monsterInfo['race'] = DOUBLE_QUESTION_MARK;
                    if($monster->race != -1)
                        $monsterInfo['race'] = MapHelpers::raceName($monster->race);
                    
                    $monsterInfo['size'] = DOUBLE_QUESTION_MARK;
                    if($monster->size != -1)
                        $monsterInfo['size'] = MapHelpers::sizeName($monster->size);
    
                    $monsterInfo['def'] = DOUBLE_QUESTION_MARK;
                    if($monster->def != -1)
                        $monsterInfo['def'] = $monster->def;
    
                    $monsterInfo['mdef'] = DOUBLE_QUESTION_MARK;
                    if($monster->mdef != -1)
                        $monsterInfo['mdef'] = $monster->mdef;
    
    
                    $extraMonsterInfo = array();
                    if ($spawnCount > 1)
                    {
                        $extraSpawnList = $mapRepository->getExtraSpawnList($mapID, $data['grpID'], $monster->id);
                        
                        foreach($extraSpawnList as $extraMonster)
                        {
                            $amount2 = DOUBLE_QUESTION_MARK;
                            $respawn = DOUBLE_QUESTION_MARK;
                            if ($extraMonster->amount2 != 0)
                            {
                                if($extraMonster->amount2 || $extraMonster->flag) 
                                    $amount2 = DOUBLE_QUESTION_MARK;
                                $respawn = formatRespawn($extraMonster->time2);
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
}