@extends('layouts.layout')

@section('content')

<div class="dateBackground">
    <div class="wrapper">
        <div class="date">
            <button class="left"><</button>
            <div>2022-6-1</div>
            <button class="right">></button>
        </div>

        <table>
            <tr class="tableHeader">
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

            <tr class="tableContent">
                <td>名前</td>
                <td>勤務開始</td>
                <td>勤務終了</td>
                <td>休憩時間</td>
                <td>勤務時間</td>
            </tr>

            {{-- @endforeach --}}

        </table>
    </div>
    {{-- <p>{{ $posts->links() }}</p> --}}
</div>

@endsection
