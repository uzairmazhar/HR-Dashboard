<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function dologin(Request $request)
    {
        dump('Here');
        $user = DB::table('users')
            ->select('*')
            ->get();
        dd($user);
    }
}
