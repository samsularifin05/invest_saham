<?php

namespace App\Http\Controllers;

use App\Models\ModelMember;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function DashboardAdmin()
    {
        $dataMember = ModelMember::all();
        $data = array(
            'dataMember' => count($dataMember),
        );
        return view('admin.dashboard.index', compact('data'));
    }
    public function DashboardMember()
    {
        return view('member.dashboard.index');
    }
}
