@extends('app')
@section('content')
    <h1>スポット情報画面</h1>
        <a href="{{route("index")}}">ホームへ</a>
    <h2><a href="{{ route('spot.create') }}" class="btn btn-primary">スポット情報新規登録</a></h2>
    <table class="table">
        <tr>
            <th>イベント名</th>
            <th>スポット名</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($spots as $item)
            <tr>
                {{-- modelsで作った関数を呼び出す↓ --}}
                <td>{{ $item->event->name}}</td>
                <td>{{ $item->name }}</td>
                <td><a href="{{ route('spot.edit', $item->id) }}" class="btn btn-success">編集</a></td>
                <td>
                    <form action="{{route("spot.delete",$item->id)}}" method="POST">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger" onclick="return confirm('削除してよろしいですか？')">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
