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
    {
        $num = $request->num;
        if (!$num) {
            $num = 0;
        }

        $getDate = Carbon::today();

        $getDate = $getDate->addDay($num);

        $attendances = Attendance::where('date', $getDate)->paginate(5);

        return view('date', compact('num', 'getDate', 'attendances'));
    }

}
