<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Dashboard');
});


Route::resource('Students', Dashboard::class);
Route::resource('Transactions', Dashboard::class);
