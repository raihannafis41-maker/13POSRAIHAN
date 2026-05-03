<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ControllerAuthLoginHistory extends Controller
{
    public function index()
    {
        $data = DB::table('loginhistory')
            ->leftJoin('user', 'loginhistory.userid', '=', 'user.id')
            ->select(
                'loginhistory.*',
                'user.name as namauser',
                'user.username'
            )
            ->orderBy('loginhistory.loginat', 'desc')
            ->get();

        return view('owner.loginhistory.index', compact('data'));
    }
}