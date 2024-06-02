<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backEnd\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\backEnd\StandingAndForumsController;

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

Route::get('/', function () {
    return view('registrationForm');
})->middleware('auth');

//Clear Route
Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return redirect()->back();
})->name('clear');
Auth::routes(['register' => false, 'login' => true]);

Route::get('/login', [LoginController::class, 'login'])->name('login');

//Register Submit Route
Route::post('/submit-form', [HomeController::class, 'formSubmit'])->name('form.submit');

//Admin Login Routes
Route::match(['GET', 'POST'], '/cms/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    //dashboard Routes
    Route::get('/dashboard', [StandingAndForumsController::class, 'dashboard'])->name('admin.dashboard');

    //committee Routes
    Route::controller(StandingAndForumsController::class)->prefix('standing-and-forums')->name('committee.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

});

