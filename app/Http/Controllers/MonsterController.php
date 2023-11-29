<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MonsterService;
use App\Http\Helpers\MonsterHelpers;

class MonsterController extends Controller
{
    public function InfoIndex(Request $request)
    {
        $menuCategories = (new MonsterService)->MenuCategories();
        $menuMonsters = (new MonsterService)->MenuMonsters();

        return view('monster/monster-info', [
            'menuCategories' => $menuCategories,
            'submenuMonsters' => $menuMonsters,
            'exp' => null,
            'data' => null
        ]);
    }

    public function InfoSearch(Request $request, string|int $id)
    {
        $menuCategories = (new MonsterService)->MenuCategories();
        $menuMonsters = (new MonsterService)->MenuMonsters();
        $monsterInfo = (new MonsterService)->MonsterInfo(preg_replace('/[^0-9]/', '', $id));
        $exp = null;
        if(count($monsterInfo) > 0)
        {
            $exp = MonsterHelpers::getExpTable($monsterInfo["monster"]->level, $monsterInfo["monster"]->expBase, $monsterInfo["monster"]->expJob);
        }

        return view('monster/monster-info', [
            'menuCategories' => $menuCategories,
            'submenuMonsters' => $menuMonsters,
            'exp' => $exp,
            'data' => $monsterInfo
        ]);
    }

    public function MonsterSearch(Request $request)
    {
        $results = null;
        $exp = null;

        # inputs from URL parameter
        $inputs = array(
            "name" => $request->get('name', null),
            "map" => $request->get('map', null),
            "skill" => $request->get('skill', null),
            "looter" => $request->get('looter', null),
            "assist" => $request->get('assist', null),
            "aggro" => $request->get('aggro', null),
            "hyper" => $request->get('hyper', null),
            "ctarget" => $request->get('ctarget', null),
            "csensor" => $request->get('csensor', null),
            "mobile" => $request->get('mobile', null),
            "plant" => $request->get('plant', null),
            "boss" => $request->get('boss', null),
            "category" => $request->get('category', null),
            "ltype" => $request->get('ltype', null),
            "sort" => $request->get('sort', null),
            "header" => $request->get('header', null),
            "hp" => $request->get('hp', null),
            "level" => $request->get('level', null),
            "attack" => $request->get('attack', null),
            "def" => $request->get('def', null),
            "mdef" => $request->get('mdef', null),
            "bexp" => $request->get('bexp', null),
            "jexp" => $request->get('jexp', null),
            "flee" => $request->get('flee', null),
            "hit" => $request->get('hit', null),
            "agi" => $request->get('agi', null),
            "vit" => $request->get('vit', null),
            "int" => $request->get('int', null),
            "dex" => $request->get('dex', null),
            "luk" => $request->get('luk', null),
            "size" => $request->get('size', null),
            "race" => $request->get('race', null),
            "eletype" => $request->get('eletype', null),
            "elelvl" => $request->get("elelvl", null)
        );

        # avoid getting all the items if not needed at startup
        if(array_filter($inputs))
        {
            $results = (new MonsterService)->MonsterSearch($inputs);
        }

        return view('monster/monster-search', [
            'inputs' => $inputs,
            'data' => $results
        ]);
    }

    public function MonsterSkill(Request $request, string|null $id = null)
    {
        $menuCategories = (new MonsterService)->MenuCategories();
        $menuMonsters = (new MonsterService)->MenuMonsters();
        $monsterSkills = null;

        if(!is_null($id))
        {
            $monsterSkills = (new MonsterService)->MonsterSkill($id);
        }

        return view('monster/monster-skill', [
            'menuCategories' => $menuCategories,
            'submenuMonsters' => $menuMonsters,
            'data' => $monsterSkills
        ]);
    }
}