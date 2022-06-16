<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Attendance extends Model
// {
//     use HasFactory;
// }

class Attendance extends Model
{
    protected $fillable = ['user_id', 'start_time', 'end_time'];

    /**
     * ユーザー関連付け
     * 1対多
     */
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
