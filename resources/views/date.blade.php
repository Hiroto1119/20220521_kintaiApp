@extends('layouts.layout')

@section('content')

<div class="dateBackground">
    <div class="wrapper">
        <div class="date">
            <button class="left"><</button>
            <div>{{$today->format('Y-m-d')}}</div>
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

            @foreach($attendances as $attendance)

            <tr class="tableContent">
                <td>{{$attendance->user->name}}</td>
                <td>{{$attendance->start_time}}</td>
                <td>{{$attendance->end_time}}</td>
                <td>{{$attendance->sumRest()}}</td>
                <td>勤務時間</td>
            </tr>

            @endforeach


        </table>
    </div>
    <p>{{ $attendances->links() }}</p>
</div>

@endsection
