@extends('app')
@section('content')
    <h1>ログ情報画面</h1>
    <a href="{{route("index")}}">ホームへ</a>
    <table class="table">
        <tr>
            <th>ログID</th>
            <th>イベント名</th>
            <th>スポット名</th>
            <th>操作種別</th>
            <th>操作日時</th>
        </tr>
        @foreach ($logs as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->event->name }}</td>
                <td>{{ $item->spots->name }}</td>
                <td>{{$item->operation_type}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <form action="{{route("log.delete",$item->id)}}" method="POST">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger" onclick="return confirm('削除してよろしいですか？')">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
