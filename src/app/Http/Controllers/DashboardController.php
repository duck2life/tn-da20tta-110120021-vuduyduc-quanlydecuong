<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashbroad()
    {
        $data['header_title'] = 'Dashbroad';
        if (Auth::user()->user_type == 1)
        {
            return view('admin.dashbroad',  $data);
        }
        else if (Auth::user()->user_type == 2)
        {
            return view('teacher.dashbroad', $data);
        }
        else if (Auth::user()->user_type == 3)
        {
            return view('guest.dashbroad', $data);
        }
    }
}
