<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\StaticController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StaticController::class, 'index'])->name('home');

//Route::get('/reg', [StaticController::class, 'sign'])->middleware("guest");

Route::get('/login', [LoginController::class, 'index'])->middleware("guest")->name('login');

Route::post('/login', [LoginController::class, 'check'])->name('check');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/reg', [RegisterController::class, 'store'])->name('register');

Route::get('/create', [SalaryController::class, 'create'])->middleware(["auth", "admin"])->name('create');

Route::get('/show', [SalaryController::class, 'show'])->middleware('hr')->name('show_all');

Route::get('/salary/{employee:id}/edit', [SalaryController::class, 'edit'])->middleware("hr")->name('edit');

Route::post('/edit/{employee:id}/salary', [SalaryController::class, 'store'])->middleware("hr")->name('add_salary');

Route::post('/update/{employee:id}/salary', [SalaryController::class, 'update'])->name('update_salary');

Route::get('/salary/{employee:id}/history', [SalaryController::class, 'history'])->middleware("hr")->name('history');


Route::get('/delete_salary/{salary:id}', [SalaryController::class, 'delete_salary'])->name('delete_salary');

Route::get('/send_email/{employee:id}', [EmailController::class, 'send'])->name('send_email');

Route::post('/report', [SalaryController::class, 'report'])->name('report');

//Route::post('/check',[LoginController::class,'check'])->name('check');