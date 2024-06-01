<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberList;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function member()
    {
        $members = Member::select('id', 'company_name')->get();
        foreach ($members as $member) {
            $member->update(['com_name' => strtolower(str_replace(['-', '_','(',')','.'], '', $member->company_name))]);
        }
    }
    public function memberList()
    {
        $members = MemberList::select('id', 'company_name')->get();
        foreach ($members as $member) {
            $member->update(['com_name' => strtolower(str_replace(['-', '_','(',')','.'], '', $member->company_name))]);
        }
    }
}
