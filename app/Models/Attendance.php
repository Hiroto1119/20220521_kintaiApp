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
    protected $fillable = ['user_id', 'start_time', 'end_time', 'date'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    // public function user()
    // {
    //     $this->belongsTo('App\Models\User');
    // }
}
