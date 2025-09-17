@extends('app')
@section('content')
<a href="{{route("spot.index")}}" class="btn btn-primary">戻る</a>
    <form action="{{route("spot.store")}}" method="post">
        @csrf
        <select name="event_id" id="">
            @foreach ($events as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <input type="text" placeholder="スポット名" name="name">
        <input type="text" placeholder="スポット詳細テキスト" name="description">
        <input type="number" placeholder="スポット位置情報(y)" name="location_y">
        <input type="number" placeholder="スポット位置情報(x)" name="location_x">
        <input type="text" placeholder="スポット画像URL" name="images">
        <button class="btn btn-primary">登録</button>
    </form>
    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
    @if (session("message"))
        <p>{{session("message")}}</p>
    @endif
@endsection