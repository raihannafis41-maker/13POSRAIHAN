<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ControllerAuthLoginHistory extends Controller
{
    public function index()
    {
        $data = DB::table('loginhistory')
            ->join('user', 'loginhistory.userid', '=', 'user.id')
            ->select('loginhistory.*', 'user.name', 'user.username')
            ->orderBy('loginhistory.id', 'desc')
            ->get();

        // FIX VIEW PATH (OWNER = ADMIN)
        return view('admin.loginhistory.index', compact('data'));
    }
}