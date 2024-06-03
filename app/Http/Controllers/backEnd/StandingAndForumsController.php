<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandingAndForumsController extends Controller
{
    protected $dirApply = 'backEnd.standingAndForums.apply';

    public function dashboard()
    {
        return view('backEnd.dashboard');
    }

    public function index()
    {
        $standingCommittee = standingCommittee();
        $forums = forums();
        $Years = range(now()->format('Y'), 2000);
        return view($this->dirApply.'.index', compact('standingCommittee','forums','Years'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return to_route('admin.login');
    }
}
