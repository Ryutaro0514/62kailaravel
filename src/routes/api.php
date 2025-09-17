<?php

use App\Http\Controllers\Apicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/events",[Apicontroller::class,"getEvent"])->name("getEvent");
Route::get("/spots",[Apicontroller::class,"getSpot"])->name("getSpot");