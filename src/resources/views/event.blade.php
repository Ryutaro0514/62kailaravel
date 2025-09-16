@extends('app')
@section('content')
    <h1>イベント情報画面</h1>
    <h2><a href="{{route("event.create")}}" class="btn btn-primary">イベント情報新規登録</a></h2>
    <table class="table">
        <tr>
            <th>イベント名</th>
            <th>開催場所</th>
            <th>開催日時</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($events as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->place}}</td>
                <td>{{$item->date}}</td>
                <td><a href="{{route("event.edit",$item->id)}}" class="btn btn-success">編集</a></td>
                <td><button class="btn btn-danger">削除</button></td>
            </tr>
        @endforeach
    </table>
@endsection
