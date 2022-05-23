<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardLettersController extends Controller
{
    public function index()
    {
        return view('dashboard.letter.index');
    }
}
