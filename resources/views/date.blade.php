@extends('layouts.layout')

@section('content')

<div class="dateBackground">
    <div class="wrapper">
        <div class="date">
            <a href="{{ route('attendance.date', ['date'=>-1]) }}" class="left"><</a>
            <div>{{$getDate->format('Y-m-d')}}</div>
            <a href="{{ route('attendance.date', ['date'=>+1]) }}" class="right">></a>
            {{-- <button a href="{{ route('date.id') }}" class="right">></button> --}}
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
                <td>{{$attendance->sumAttendance()}}</td>
            </tr>

            @endforeach


        </table>
    </div>
    <p>{{ $attendances->links() }}</p>
</div>

@endsection
