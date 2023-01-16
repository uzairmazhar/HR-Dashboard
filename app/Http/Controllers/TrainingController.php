<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Grade;
use App\Models\Training;
use App\Models\Users;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $data['path'] = Route::getFacadeRoot()->current()->uri();
            $data['user'] = Users::find($user_id);
            $data['trainings'] = Training::where('user_id',$user_id)
                ->get();
            $data['panelHeading'] = 'Trainings';
//            dd($data['vacancies'][0]->id);
            return view('basic.trainings', $data);
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id = Session::get('id');
        if(isset($user_id)){
            $data['path'] = Route::getFacadeRoot()->current()->uri();
            $user = Users::find($user_id);
            $data['user'] = $user;
            return view('basic.add-training', $data);
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $training_title = $request->input('training_title');
            $training_hours = $request->input('training_hours');
            $training_date = $request->input('conducted_date');

            $training = new Training();
            $training->training_name = $training_title;
            $training->training_hours = $training_hours;
            $training->training_date = $training_date;
            $training->user_id = $user_id;

            $training->save();

            Session::flash('success','Training added Successfully');
            return Redirect::back();
        }
        Session::error('error','Your session has expired');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $data['path'] = Route::getFacadeRoot()->current()->uri();
            $data['user'] = Training::find($user_id);
            $data['trainings'] = Training::where('id',Crypt::decrypt($id))
                ->first();
            return view('basic.update-training', $data);
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $training_title = $request->input('training_title');
            $training_hours = $request->input('training_hours');
            $training_date = $request->input('conducted_at');

            $training = Training::find(Crypt::decrypt($id));
            $training->training_name = $training_title;
            $training->training_hours = $training_hours;
            $training->training_date = $training_date;
            $training->user_id = $user_id;
            $training->save();

            Session::flash('success','Training added Successfully');
            return Redirect::back();
        }
        Session::error('error','Your session has expired');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
