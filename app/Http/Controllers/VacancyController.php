<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Grade;
use App\Models\Users;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class VacancyController extends Controller
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
            return view('basic.add-vacancy', $data);
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
        $user_id = Session::get('id');
        if(isset($user_id)){
            $data['path'] = Route::getFacadeRoot()->current()->uri();
            $user = Users::find($user_id);
            $data['user'] = $user;
            $data['grades'] = Grade::all();
//            dd($data['grades']);
            $data['departments'] = Department::where('division_id',$user->division_id)->get();
            $data['years'] = array_combine(range(date("Y"), 2022), range(date("Y"), 2022));
            return view('basic.add-vacancy', $data);
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
            $position_title = $request->input('position_title');
            $total_positions = $request->input('total_positions');
            $department_id = $request->input('department');
            $grade_id = $request->input('grade');
            $salary_max = $request->input('salary_max');
            $salary_min = $request->input('salary_min');
            $approved = $request->input('approved');
            $hiring_year = $request->input('hiring_year');

//            dd($grade_id);

            $vacancy = new Vacancy();
            $vacancy->number_of_positions = $total_positions;
            $vacancy->position_title = $position_title;
            $vacancy->grade_id = $grade_id;
            $vacancy->salary_max = $salary_max;
            $vacancy->salary_min = $salary_min;
            $vacancy->approved = $approved;
            $vacancy->expected_hiring_year = $hiring_year;
            $vacancy->department_id = $department_id;
            $vacancy->user_id = $user_id;

            $vacancy->save();

            Session::flash('success','Vacancy added Successfully');
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
        //
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
        //
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
