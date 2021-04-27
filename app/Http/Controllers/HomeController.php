<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        return view('admin/beranda', compact('title'));
    }
}