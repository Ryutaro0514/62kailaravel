@extends('app')
@section('content')
<a href="{{route("event.index")}}" class="btn btn-primary">戻る</a>
    <form action="{{route("event.store")}}" method="post">
        @csrf
        <input type="text" placeholder="イベント名" name="name">
        <input type="text" placeholder="開催場所" name="place">
        <input type="date" placeholder="開催日" name="date">
        <input type="text" placeholder="イベントマップURL" name="map_image">
        <button class="btn btn-primary">登録</button>
    </form>
    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
    @if (session("message"))
        <p>{{session("message")}}</p>
    @endif
@endsection