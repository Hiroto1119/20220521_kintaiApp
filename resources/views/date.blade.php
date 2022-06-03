@extends('layouts.layout')

@section('content')

<main>
    <div class="date">
        <div><</div>
        <div>2022-6-1</div>
        <div>></div>
    </div>
    <table>
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>

        {{-- @foreach($posts as $post) --}}
        
        {{-- <tr>
            <td>{{$post->name}}</td>
            <td>{{$post->start_time}}</td>
            <td>{{$post->end_time}}</td>
            <td>{{$post->休憩時間}}</td>
            <td>{{$post->勤務時間}}</td>
        </tr> --}}

        <tr>
            <td>名前</td>
            <td>勤務開始</td>
            <td>勤務終了</td>
            <td>休憩時間</td>
            <td>勤務時間</td>
        </tr>

        {{-- @endforeach --}}

    </table>
    {{-- <p>{{ $posts->links() }}</p> --}}
</main>

@endsection
