<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StampController extends Controller
{

    public function index()
    {
        // $user = Auth::user();
        // return view('stamp', ['user' => $user]);
        return view('stamp');
        // return view('contact.search', ['posts' => $posts], ['inputs' => $inputs]);
    }

}
