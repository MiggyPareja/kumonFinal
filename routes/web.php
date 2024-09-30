<?php
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('Dashboard.index');
Route::get('/dashboard/pass', [Dashboard::class, 'pass'])->name('Dashboard.pass');

Route::resource('Students', StudentController::class);
Route::resource('Transactions', TransactionsController::class);




