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
        $mapData = (new MapService)->MapInfo($id);
        return view('map/info', [
            'categoryMenu' => $mapCategories,
            'menuData' => $maps,
            'data' => $mapData
        ]);
    }

    public function WorldMap()
    {
        $mapData = (new MapService)->World1Info();
        return view('map/world', [
            "mapData" => $mapData
        ]);
    }
    
    public function NewWorld()
    {
        $mapData = (new MapService)->World1Info();
        return view('map/new-world', [
            "mapData" => $mapData
        ]);
    }

    public function Dungeons()
    {
        $mapData = (new MapService)->World2Info();
        return view('map/dungeon', [
            "mapData" => $mapData,
            "dungeons" => include(resource_path('data\map\dungeon.php'))
        ]);
    }

    public function Instances()
    {
        $mapData = (new MapService)->World2Info();
        return view('map/instance', [
            "mapData" => $mapData,
            "instances" => include(resource_path('data\map\instance.php'))
        ]);
    }

    public function Towns()
    {
        $mapData = (new MapService)->World2Info();
        return view('map/town', [
            "mapData" => $mapData
        ]);
    }
}
