<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MapService;

class MapController extends Controller
{
    public function MapIndex(Request $request)
    {
        $mapCategories = (new MapService)->MenuCategories();
        $maps = (new MapService)->MenuData();
        return view('map/info', [
            'categoryMenu' => $mapCategories,
            'menuData' => $maps,
            'data' => null
        ]);
    }

    public function MapSearch(Request $request, string|int $id)
    {
        $mapCategories = (new MapService)->MenuCategories();
        $maps = (new MapService)->MenuData();
        $mapData = (new MapService)->Info($id);
        return view('map/info', [
            'categoryMenu' => $mapCategories,
            'menuData' => $maps,
            'data' => $mapData
        ]);
    }

    public function NewWorld()
    {
        $mapData = (new MapService)->NewWorld();
        return view('map/new-world', [
            "mapData" => $mapData
        ]);
    }
}
