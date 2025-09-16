<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/",[UserController::class,"index"])->name("index");
Route::get("/event",[EventController::class,"index"])->name("event.index");
Route::get("/event/create",[EventController::class,"create"])->name("event.create");
Route::post("/event/create",[EventController::class,"store"])->name("event.store");
Route::get("/event/edit/{id}",[EventController::class,"edit"])->name("event.edit");
Route::patch("event/edit/{id}",[EventController::class,"update"])->name("event.update");