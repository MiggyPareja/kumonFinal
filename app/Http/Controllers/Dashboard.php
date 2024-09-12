<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Carbon\Carbon;

class Dashboard extends Controller
{
    public function index()
    {

        return view('Dashboard');
    }

}
