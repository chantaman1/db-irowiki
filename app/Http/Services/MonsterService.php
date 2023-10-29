<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Repositories\MonsterRepository;

class MonsterService
{
    public function MenuCategories(int|null $id = null)
    {
        return (new MonsterRepository)->getMenuCategories($id);
    }

    public function MenuMonsters(int|null $id = null)
    {
        return (new MonsterRepository)->getMenuMonsters($id);
    }

    public function MonsterInfo(int|null $id = null)
    {
        $monsterRepository = new MonsterRepository();

        $output = array(
            "monster" => null,
            "elementChart" => null,
            "normalDrops" => null,
            "mvpDrops" => null,
            "mapList" => null,
            "mode" => null,
            "skills" => null,
            "spawnMob" => null,
            "summonMob" => null,
            "summonList" => null,
            "metamorphosis" => null
        );

        if(is_null($id))
        {
            return $output;
        }

        $output["monster"] = $monsterRepository->getMonsterById($id);
        
        if(is_null($output["monster"]))
        {
            return $output;
        }

        $elementChart = $monsterRepository->getMonsterElementChart($output["monster"]->eleType, $output["monster"]->eleLvl);
        $output["elementChart"] = count($elementChart) > 0 ? $elementChart : null;

        $normalDrops = $monsterRepository->getMonsterDropByIdAndType($id, 1);
        $output["normalDrops"] = count($normalDrops) > 0 ? $normalDrops : null;
        
        $mvpDrops = $monsterRepository->getMonsterDropByIdAndType($id, 2);
        $output["mvpDrops"] = count($mvpDrops) > 0 ? $mvpDrops : null;

        $mapList = $monsterRepository->getMonsterMapListById($id);
        $output["mapList"] = count($mapList) > 0 ? $mapList : null;

        $output["mode"] = $monsterRepository->getMonsterModeListById($id);

        $skills = $monsterRepository->getMonsterSkillsById($id);
        $output["skills"] = count($skills) > 0 ? $skills : null;

        $spawnMob = $monsterRepository->getMonsterSpawnMobById($id);
        $output["spawnMob"] = count($spawnMob) > 0 ? $spawnMob : null;

        $summonMob = $monsterRepository->getMonsterSummonMobById($id);
        $output["summonMob"] = count($summonMob) > 0 ? $summonMob : null;

        $summonList = $monsterRepository->getMonsterSummonListById($id);
        $output["summonList"] = count($summonList) > 0 ? $summonList : null;

        $meta = $monsterRepository->getMonsterMetamorphosisListById($id);
        $output["metamorphosis"] = count($meta) > 0 ? $meta : null;

        return $output;
    }

    public function MonsterSearch(array $searchTerms)
    {
        return (new MonsterRepository)->getMonstersByInputs($searchTerms);
    }
}