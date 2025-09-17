@extends('app')
@section('content')
    <h1>メニュー画面</h1>
    <a href="{{route("event.index")}}">イベント情報</a>
    <a href="{{route("spot.index")}}">スポット情報</a>
    <a href="{{route("log.index")}}">ログ情報</a>
@endsection