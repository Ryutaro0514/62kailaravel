<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Class_;

Route::get("/",[UserController::class,"index"])->name("index");

Route::get("/event",[EventController::class,"index"])->name("event.index");
Route::get("/event/create",[EventController::class,"create"])->name("event.create");
Route::post("/event/create",[EventController::class,"store"])->name("event.store");
Route::get("/event/edit/{id}",[EventController::class,"edit"])->name("event.edit");
Route::patch("event/edit/{id}",[EventController::class,"update"])->name("event.update");
Route::delete("event/{id}",[EventController::class,"destroy"])->name("event.delete");


Route::get("/spot",[SpotController::class,"index"])->name("spot.index");
Route::get("/spot/create",[SpotController::class,"create"])->name("spot.create");
Route::post("/spot/create",[SpotController::class,"store"])->name("spot.store");
Route::get("/spot/edit/{id}",[SpotController::class,"edit"])->name("spot.edit");
Route::patch("spot/edit/{id}",[SpotController::class,"update"])->name("spot.update");
Route::delete("spot/{id}",[SpotController::class,"destroy"])->name("spot.delete");

Route::get("/log",[LogController::class,"index"])->name("log.index");
Route::delete("log/{id}",[LogController::class,"destroy"])->name("log.delete");
