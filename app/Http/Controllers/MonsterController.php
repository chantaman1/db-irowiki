<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MonsterService;

class MonsterController extends Controller
{
    public function InfoIndex(Request $request)
    {
        $menuCategories = (new MonsterService)->MenuCategories();
        $menuMonsters = (new MonsterService)->MenuMonsters();

        return view('monster/monster-info', [
            'menuCategories' => $menuCategories,
            'submenuMonsters' => $menuMonsters,
            'data' => null
        ]);
    }

    public function InfoSearch(Request $request, string|int $id)
    {
        $menuCategories = (new MonsterService)->MenuCategories();
        $menuMonsters = (new MonsterService)->MenuMonsters();
        $monsterInfo = (new MonsterService)->MonsterInfo(preg_replace('/[^0-9]/', '', $id));

        return view('monster/monster-info', [
            'menuCategories' => $menuCategories,
            'submenuMonsters' => $menuMonsters,
            'data' => $monsterInfo
        ]);
    }
}