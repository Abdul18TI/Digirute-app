<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home_admin()
    {
        return view('Admin.dashboard.home', [
            "title" => "Dashboard"
        ]);
    }
}
