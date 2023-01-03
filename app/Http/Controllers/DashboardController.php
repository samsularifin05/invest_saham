<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function DashboardAdmin()
    {
        return view('admin.dashboard.index');
    }
    public function DashboardMember()
    {
        return view('member.dashboard.index');
    }
}
