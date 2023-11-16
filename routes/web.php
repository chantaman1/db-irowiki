<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MainController;
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
| Map Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db/map-info/', [MapController::class, 'MapIndex']);
Route::get('/db/map-info/{id}', [MapController::class, 'MapSearch']);

Route::get('/db/newworld-map', [MapController::class, 'NewWorld']);

/*
|--------------------------------------------------------------------------
| Tool Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/db/server-status', [ToolController::class, 'ServerStatus']);
