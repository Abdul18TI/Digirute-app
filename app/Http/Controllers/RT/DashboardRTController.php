<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardRTController extends Controller
{
    //
    public function index()
    {
        // return '<pre>' . auth()->guard('rt')->user() . '</pre>';
        $title = "Dashboard";
        return view('RT.dashboard-rt', compact('title'));
    }
}
