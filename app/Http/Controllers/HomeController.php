<?php

namespace App\Http\Controllers;

use App\Models\ModelProduk;

class HomeController extends Controller
{
    public function index()
    {
        $dataproduk = ModelProduk::all();

        return view('member.home.index',compact('dataproduk'));
    }
}
