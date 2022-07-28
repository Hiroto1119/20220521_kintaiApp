<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rest;

// class Attendance extends Model
// {
//     use HasFactory;
// }

class Attendance extends Model
{
    protected $fillable = ['user_id', 'start_time', 'end_time', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    public function sumRest()
    {
        $rests = $this->rests;
        // 上のrestsを取得している
        // dd($rests);
        $sum = 0;

        foreach($rests as $rest)
        {
            $start_time = $rest->start_time;
            $end_time = $rest->end_time;
            // 秒に直して計算する、差分の秒を足す
            // $sumRestTime = ($end_time - $start_time);
            $start_time_cal = strtotime($start_time);
            // dd($start_time_cal);
            $end_time_cal = strtotime($end_time);

            // var_dump($end_time);
            if(!$end_time) {
                continue;
            }
            $sumRestTime = ($end_time_cal - $start_time_cal);
            $sum = $sum + $sumRestTime;

            // dd($sumRestTime);

            // return ($start_time);
            // dd($start_time);
        }
        $hours = floor($sum / 3600);
        $minutes = floor(($sum / 60) % 60);
        $seconds = $sum % 60;
        $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

        return $hms;
    }

    public function sumAttendance()
    {
        $start_time = $this->start_time;
        $end_time = $this->end_time;

        $start_time_cal = strtotime($start_time);
        $end_time_cal = strtotime($end_time);
        // dd($start_time_cal);

        if(!$end_time) {
            return;
        }

        $sumAttendanceTime = ($end_time_cal - $start_time_cal);
        // dd($sumAttendanceTime);
        $sum = $sumAttendanceTime - $this->hour_to_sec($this->sumRest());
        // dd($sum);
        $hours = floor($sum / 3600);
        $minutes = floor(($sum / 60) % 60);
        $seconds = $sum % 60;
        $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

        return $hms;
    }

    function hour_to_sec($str)
    {
        $t = explode(":", $str); //配列（$t[0]（時）、$t[1]（分）、$t[2]（秒））にする
        $h = (int)$t[0];
        if (isset($t[1])) { //分の部分に値が入っているか確認
            $m = (int)$t[1];
        } else {
            $m = 0;
        }
        if (isset($t[2])) { //秒の部分に値が入っているか確認
            $s = (int)$t[2];
        } else {
            $s = 0;
        }
        return ($h * 60 * 60) + ($m * 60) + $s;
    }

    // public function sumAttendance()
    // {
    //     return $this->hasMany(Rest::class);
    // }

}
