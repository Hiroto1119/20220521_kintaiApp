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
        // $attendance = new Attendance();

        // $attendance->user_id = Auth::user()->id;
        // $attendance->date = Carbon::today();
        // $attendance->start_time = Carbon::now();

        // $attendance->save();
        // return view('date');

        $user = Auth::user();

        /**
         * 打刻は1日一回までにしたい
         * DB
         */
        $oldAttendance = Attendance::where('user_id', $user->id)->latest()->first();
        if ( !empty($oldAttendance)) {
            $oldAttendanceStart = new Carbon($oldAttendance->start_time);
            // $oldAttendanceDay = $oldAttendanceStart->startOfDay();
            $oldAttendanceDay = $oldAttendanceStart->startOfDay();
        }

        $newAttendanceDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        if (($oldAttendanceDay == $newAttendanceDay) && (empty($oldAttendance->end_time))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $attendance = Attendance::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }



    public function end()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();

        if( !empty($attendance->end_time)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }

        $attendance->update([
            'end_time' => Carbon::now()
        ]);

        return view('date')->with('my_status', '退勤打刻が完了しました');
        // return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }

}
