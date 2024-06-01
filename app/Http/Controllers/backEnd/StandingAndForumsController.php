<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $Years = range(2000, now()->format('Y'));
        return view($this->dirApply.'.index', compact('standingCommittee','forums','Years'));
    }
}
