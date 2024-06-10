<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backEnd\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\backEnd\StandingAndForumsController;
use App\Http\Controllers\RegistrationController;
use App\Models\MemberList;
use Illuminate\Support\Facades\DB;

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

Route::get('/', [RegistrationController::class, 'index'])->middleware('auth');
Route::get('/member-logout', [RegistrationController::class, 'logout'])->name('member.logout');

//Clear Route
Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return redirect()->back();
})->name('clear');

Auth::routes(['register' => false, 'login' => true]);

Route::get('/login', [LoginController::class, 'login'])->name('login');

//Register Submit Route
Route::post('/submit-form', [RegistrationController::class, 'formSubmit'])->name('form.submit');

//Admin Login Routes
Route::match(['GET', 'POST'], '/cms/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    // Logout
    Route::get('/login-out', [StandingAndForumsController::class, 'logout'])->name('admin.logout');
    //dashboard Routes
    Route::get('/dashboard', [StandingAndForumsController::class, 'dashboard'])->name('admin.dashboard');

    //committee Routes
    Route::controller(StandingAndForumsController::class)->prefix('standing-and-forums')->name('committee.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/view', 'view')->name('view');
        Route::post('/update', 'update')->name('update');
        Route::post('/destroy', 'destroy')->name('delete');
        Route::post('/reject', 'reject')->name('reject');
        Route::post('/approve', 'approve')->name('approve');
        Route::post('/pending', 'pending')->name('pending');
        Route::post('/storeComment', 'storeComment')->name('storeComment');
    });

    Route::get('/member-list-migrate', function () {
        // $members = json_decode(file_get_contents(public_path("/json/members.json")), true);
        // foreach ($members as $member) {
        //     \App\Models\MemberList::create($member);
        // }

        $registrations = \App\Models\Priority::select('id', 'registration_id')->with('registration:id,membership_id')->where('priority_type', 'committe')->get();
        foreach ($registrations as $register) {
            $member = \DB::table('member_lists')->where('membership_no', $register->registration->membership_id)->first();
            if (isset($member)) {
                echo $member->company_name . '<br>';
                \App\Models\Priority::find($register->id)->update([
                    'par_name' => $member->rep_name,
                    'par_designation' => $member->rep_designation,
                ]);
            }
        }
    });

    Route::get('/member-info-update', function () {
        $members=\DB::table('member_lists')->get();
        foreach($members as $member ){
            \DB::table('members')->where('membership_id', $member->membership_no)->update([
                'name' => $member->rep_name,
                'designation' => $member->rep_designation,
            ]);
        }
        dd('done');
    });

    Route::get('/update-agree', function () {
        \DB::table('registration')->update(['is_agree'=>1]);
        dd('done');
    });
});
