<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function start()
    {
        $user_id = Auth::id();
        $newAttendanceDay = Carbon::today();

        /**
         * 打刻は1日一回までにしたい
         * DB
         */
        $oldAttendance = Attendance::where('user_id', $user_id)->latest()->first();

        // DD($user);
        // DD($oldAttendance);

        if ( !empty($oldAttendance)) {
            $oldAttendanceDate = $oldAttendance->date;
            $newAttendanceDate = $newAttendanceDay->format('Y-m-d');
            if ($oldAttendanceDate == $newAttendanceDate) {
                return back()->with('error', 'すでに出勤打刻がされています');
            }
        }

        Attendance::create([
            'user_id' => $user_id,
            'start_time' => Carbon::now(),
            'date' => $newAttendanceDay
        ]);

        return back()->with('my_status', '出勤打刻が完了しました');
    }


    public function end()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();

        if(empty($attendance) || !empty($attendance->end_time)) {
            return back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }

        $attendance->update([
            'end_time' => Carbon::now()
        ]);

        return back()->with('my_status', '退勤打刻が完了しました');
    }

    public function index(Request $request)
    // public function index()
    {
        // if ($request->date) {
        //     dd($request->date);
        // }
        // $id = 1;
        $getDate = Carbon::today();
        // dd($getDate);

        if ($request->date) {
            $getDate = $getDate->addDay($request->date);
        }

        // これに+1する

        // if文を使う

        // $date = new Carbon('{$id} day');
        // dd($id);
        // dd($tomorrow);
        $attendances = Attendance::where('date', $getDate)->paginate(5);
        // dd($attendancesToday);
        // attendancesの日付と今日の日付が一致した場合に、表示する。whereで絞り込む。
        // $attendances = Attendance::simplePaginate(5);
        // dd($attendances);
        // $today = Carbon::today();
        $attendanceStarts = Attendance::all();
        $attendanceEnds = Attendance::all();

        // return view('date',
        //             ['attendances' => $attendancesToday],
        //             ['today' => $day],
        //             ['attendanceStarts' => $attendanceStarts],
        //             ['attendanceEnds' => $attendanceEnds],
        //             );

        return view('date', ['attendances' => $attendances], ['getDate' => $getDate]);
    }

}
