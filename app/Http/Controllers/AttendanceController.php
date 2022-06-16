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
        $attendance = new Attendance();

        $attendance->user_id = Auth::user()->id;
        $attendance->date = Carbon::today();
        $attendance->start_time = Carbon::now();

        $attendance->save();
        return view('date');
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

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }

}
