<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use PhpSpec\Exception\Exception;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $data['path'] = Route::getFacadeRoot()->current()->uri();
            $data['user'] = Users::find($user_id);
            return view('basic.dashboard', $data);
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
    }
}
