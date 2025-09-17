<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //全部のスポットの内容を取得
        $spots=Spot::get();
        return view("spot",compact("spots"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $events=Event::get();
        return view("spotCreate",compact("events"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "event_id"=>"required",
            "name"=>"required",
            "description"=>"required",
            "location_x"=>"required",
            "location_y"=>"required",
            "images"=>"required"
        ],[
            "event_id.required"=>"エラーが発生しました",
            "name.required"=>"エラーが発生しました",
            "description.required"=>"エラーが発生しました",
            "location_x.required"=>"エラーが発生しました",
            "location_y.required"=>"エラーが発生しました",
            "images.required"=>"エラーが発生しました"
        ]);
        Spot::query()->create([
            "event_id"=>$request->event_id,
            "name"=>$request->name,
            "description"=>$request->description,
            "location_x"=>$request->location_x,
            "location_y"=>$request->location_y,
            "images"=>str_replace(" ","",$request->images)
        ]);
        return redirect(route("spot.create"))->with(["message"=>"スポット情報が登録されました"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Spot $spot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spot $spot ,string $id)
    {
        //
        $spot=Spot::find($id);
        $events=Event::get();
        return view("spotEdit",compact("spot","events"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot ,string $id)
    {
        //
        $request->validate([
            "event_id"=>"required",
            "name"=>"required",
            "description"=>"required",
            "location_x"=>"required",
            "location_y"=>"required",
            "images"=>"required"
        ],[
            "event_id.required"=>"エラーが発生しました",
            "name.required"=>"エラーが発生しました",
            "description.required"=>"エラーが発生しました",
            "location_x.required"=>"エラーが発生しました",
            "location_y.required"=>"エラーが発生しました",
            "images.required"=>"エラーが発生しました"
        ]);
        $spot=Spot::find($id);
        $spot->update([
            "event_id"=>$request->event_id,
            "name"=>$request->name,
            "description"=>$request->description,
            "location_x"=>$request->location_x,
            "location_y"=>$request->location_y,
            "images"=>str_replace(" ","",$request->images)
        ]);
        return redirect(route("spot.edit",$id))->with(["message"=>"スポット情報が更新されました"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spot $spot ,string $id)
    {
        //
        $a=Spot::find($id);
        $a->delete();
        return redirect(route("spot.index"));
    }
}
