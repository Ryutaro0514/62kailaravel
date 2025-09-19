<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Log;
use App\Models\Spot;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Apicontroller extends Controller
{
    public function getEvent(Request $request)
    {
        $eventID = $request->id;
        if (!$eventID) {
            return response()->json(["error" => "idがありません"], 404);
        }
        $getEvent = Event::find($eventID);
        if (!$getEvent) {
            return response()->json(["error" => "eventがありません"], 404);
        }
        $getSpot = Spot::where("event_id", $eventID)->get();
        $spots = [];
        foreach ($getSpot as $item) {
            $spots[] = [
                "name" => $item->name,
                "description" => $item->description,
                "location_x" => $item->location_x,
                "location_y" => $item->location_y,
                "map_image" => explode(",", $item->images)
            ];
        }
        $result = [
            "name" => $getEvent->name,
            "map_image" => $getEvent->map_image,
            "spots" => $spots
        ];
        return response()->json($result, 200);
    }

    public function getSpot(Request $request)
    {
        $eventID = $request->event_id;
        if (!$eventID) {
            return response()->json(["error" => "event_idがありません"], 404);
        }
        $spots = Spot::query();
        if ($request->description) {
            $spots->where("description", "=", $request->description);
        }
        if ($request->max_x) {
            $spots->where("location_x", "<=", $request->max_x);
        }
        if ($request->min_x) {
            $spots->where("location_x", ">=", $request->min_x);
        }
        if ($request->max_y) {
            $spots->where("location_y", "<=", $request->max_y);
        }
        if ($request->min_y) {
            $spots->where("location_y", ">=", $request->min_y);
        }
        if ($request->name) {
            $spots->where("name", "LIKE", "%" . $request->name . "%");
        }
        $spots = $spots->where("event_id", $eventID)->get();
        $result = [];
        foreach ($spots as $item) {
            $result[] = [
                "name" => $item->name,
                "description" => $item->description,
                "location_x" => $item->location_x,
                "location_y" => $item->location_y,
                "map_image" => explode(",", $item->images)
            ];
        }
        return response()->json($result, 200);
    }
    public function postLog(Request $request)
{
    $eventID = $request->event_id;
    $spotID = $request->spot_id;
    $operation_type = $request->operation_type;
    $eventCheck=false;
    $spotCheck=false;
    if (!$eventID) {
        return response()->json(["error" => "event_idがありません"], 404);
    }
    if (!$operation_type) {
        return response()->json(["error" => "operation_typeがありません"], 404);
    }
    $event=Event::query()->find($eventID);
    if (!empty($event)){
        $eventCheck=true;
    }
    $spot=Spot::query()->find($spotID);
    if(!empty($spot)){
        $spotCheck=true;
    }
    if ($eventCheck){
        $log = Log::create([
            "event_id" => $eventID,
            "spot_id" => $spotCheck?$spotID:null,
            "operation_type" => $operation_type
        ]);
    }

    return response()->json($log, 200);
}

}

