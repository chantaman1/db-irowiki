<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\ToolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/db');
});

/*
|--------------------------------------------------------------------------
| Main Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db', [MainController::class, 'Index']);
Route::get('/db/search', [MainController::class, 'Search']);
Route::get('/db/settings', [MainController::class, 'Settings']);


/*
|--------------------------------------------------------------------------
| Item Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db/item-info/', [ItemController::class, 'InfoIndex']);
Route::get('/db/item-info/{id}', [ItemController::class, 'InfoSearch']);

Route::get('/db/weapon-search/', [ItemController::class, 'WeaponSearch']);
Route::get('/db/gear-search/', [ItemController::class, 'GearSearch']);
Route::get('/db/costume-search/', [ItemController::class, 'CostumeSearch']);
Route::get('/db/consume-search/', [ItemController::class, 'ConsumeSearch']);
Route::get('/db/card-search/', [ItemController::class, 'CardSearch']);


/*
|--------------------------------------------------------------------------
| Monster Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db/monster-info/', [MonsterController::class, 'InfoIndex']);
Route::get('/db/monster-info/{id}', [MonsterController::class, 'InfoSearch']);

Route::get('/db/monster-search/', [MonsterController::class, 'MonsterSearch']);
Route::get('/db/monster-skill/', [MonsterController::class, 'MonsterSkill']);
Route::get('/db/monster-skill/{id}', [MonsterController::class, 'MonsterSkill']);


/*
|--------------------------------------------------------------------------
| Map Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db/map-info/', [MapController::class, 'MapIndex']);
Route::get('/db/map-info/{id}', [MapController::class, 'MapSearch']);

Route::get('/db/newworld-map', [MapController::class, 'NewWorld']);
Route::get('/db/world-map', [MapController::class, 'WorldMap']);
Route::get('/db/dungeon-map', [MapController::class, 'Dungeons']);
Route::get('/db/instance-map', [MapController::class, 'Instances']);
Route::get('/db/town-map', [MapController::class, 'Towns']);


/*
|--------------------------------------------------------------------------
| Misc Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db/shop-info/', [MiscController::class, 'ShopInfo']);
Route::get('/db/shop-info/{id}', [MiscController::class, 'ShopSearch']);

Route::get('/db/treasure-drops/', [MiscController::class, 'TreasureDrops']);
Route::get('/db/treasure-drops/{id}', [MiscController::class, 'TreasureDropSearch']);

Route::get('/db/arrow-craft/', [MiscController::class, 'ArrowCraft']);

/*
|--------------------------------------------------------------------------
| Tool Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db/server-status', [ToolController::class, 'ServerStatus']);
