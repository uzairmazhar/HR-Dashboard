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
use Illuminate\Support\Facades\Crypt;

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
            $data['vacancies'] = Vacancy::join('grades','vacancies.grade_id','=','grades.id')
                ->join('departments','vacancies.department_id','=','departments.id')
                ->where('user_id',$user_id)
                ->select("*","vacancies.id")
                ->get();
            $data['panelHeading'] = 'Vacancies';
            return view('basic.vacancies', $data);
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
            $hiring_month = $request->input('hiring_month');

            if($salary_max < $salary_min){
                Session::flash('error','Maximum Salary can not be greater than minimum salary.');
                return Redirect::back();
            }
//            dd($total_positions);
            for($i=0;$i<$total_positions;$i++){
                $vacancy = new Vacancy();
                $vacancy->number_of_positions = 1;
                $vacancy->position_title = $position_title;
                $vacancy->grade_id = $grade_id;
                $vacancy->salary_max = $salary_max;
                $vacancy->salary_min = $salary_min;
                $vacancy->approved = $approved;
                $vacancy->expected_hiring_year = $hiring_year;
                $vacancy->expected_hiring_month = $hiring_month;
                $vacancy->department_id = $department_id;
                $vacancy->user_id = $user_id;

                $vacancy->save();
            }
            Session::flash('success','Vacancy added Successfully');
            return Redirect::back();
        }
        Session::flash('error','Your session has expired');
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
            $data['user'] = Vacancy::find($user_id);

            $data['vacancy'] = Vacancy::join('grades','vacancies.grade_id','=','grades.id')
                ->join('departments','vacancies.department_id','=','departments.id')
                ->where('vacancies.id',Crypt::decrypt($id))
                ->select('*','vacancies.id')
                ->first();
            $data['grades'] = Grade::all();
            $data['departments'] = Department::all();
            $data['years'] = array_combine(range(date("Y"), 2022), range(date("Y"), 2022));
            return view('basic.update-vacancy', $data);
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
        if(isset($user_id)) {
            $vacancy = Vacancy::find(Crypt::decrypt($id));

            $position_title = $request->input('position_title');
//            $total_positions = $request->input('total_positions');
            $department_id = $request->input('department');
            $grade_id = $request->input('grade');
            $salary_max = $request->input('salary_max');
            $salary_min = $request->input('salary_min');
            $approved = $request->input('approved');
            $hiring_year = $request->input('hiring_year');
            $filled = $request->input('filled');

            if($salary_max < $salary_min){
                Session::error('error','Maximum Salary can not be greater than minimum salary.');
                return Redirect::back();
            }
//            $vacancy->number_of_positions = $total_positions;
            $vacancy->position_title = $position_title;
            $vacancy->grade_id = $grade_id;
            $vacancy->salary_max = $salary_max;
            $vacancy->salary_min = $salary_min;
            $vacancy->approved = $approved;
            $vacancy->expected_hiring_year = $hiring_year;
            $vacancy->department_id = $department_id;
            if($filled != 0){
                $vacancy->filled = 1;
                $filled_at = $request->input('filled_at');
                $vacancy->filled_at = $filled_at;
            }
            $vacancy->user_id = $user_id;

            $vacancy->save();

            Session::flash('success','Vacancy Updated Successfully');
            return Redirect::back();
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
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
