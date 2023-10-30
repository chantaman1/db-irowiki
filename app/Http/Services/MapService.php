<?php

namespace App\Http\Services;

use App\Http\Repositories\MapRepository;

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

    public function spawnList($mapID)
    {
        $mapRepository = new MapRepository();

        $spawnListGroupList = $mapRepository->getSpawnListGroupList($mapID)->all();
        if (count($spawnListGroupList) > 0)
        {
            $grpList = array();
            foreach($spawnListGroupList as $spawnList) 
            {
                array_push($grpList, array($spawnList->grp, $spawnList->name, $spawnList->note, "grp=$grpID"));
            }
        } 
        else
        {
            $grpList = array(
                array(0, null, null, "category!=2 AND category!=5"),
                array(0, "MVP", null, "category=2"),
                array(0, "Plant", null, "category=5")
            );
        }

        foreach($grpList as $data)
        {
            $spawnlist = $mapRepository->getSpawnList($mapID, $data->grpID);
            if($spawnlist)
            {
                if($data->grpName)
                {
                    // Will Do Later
                }
            }
        }

    }

    public function mapInfo(int|string|null $id = null)
    {
        $mapRepository = new MapRepository();

        $output = array(
            "map" => null,
            "mapType" => null,
            "mapShops" => null,
            "mapBGM" => null,
            "zoneInfo" => "(Unknown)",
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

        

        return $output;
    }
}