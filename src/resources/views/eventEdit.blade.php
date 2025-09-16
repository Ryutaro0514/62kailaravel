@extends('app')
@section('content')
<a href="{{route("event.index")}}" class="btn btn-primary">戻る</a>
    <form action="{{route("event.update",$event->id)}}" method="post">
        @csrf
        @method("patch")
        <input type="text" placeholder="イベント名" name="name" value="{{$event->name}}">
        <input type="text" placeholder="開催場所" name="place" value="{{$event->place}}">
        <input type="date" placeholder="開催日" name="date" value="{{$event->date}}">
        <input type="text" placeholder="イベントマップURL" name="map_image" value="{{$event->map_image}}">
        <button class="btn btn-primary">保存</button>
    </form>
    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
    @if (session("message"))
        <p>{{session("message")}}</p>
    @endif
@endsection