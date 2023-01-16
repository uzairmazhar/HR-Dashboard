<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Grade;
use App\Models\Training;
use App\Models\Users;
use App\Models\EmployeeTraining;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class EmployeeTrainingController extends Controller
{
    public function index()
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $data['path'] = Route::getFacadeRoot()->current()->uri();
            $data['user'] = Users::find($user_id);
            $data['employees'] = EmployeeTraining::join('trainings','employee_trainings.training_id','=','trainings.id')
                ->join('users','trainings.user_id','users.id')
                ->where('users.id','=',$user_id)
                ->select('employee_trainings.id','employee_trainings.employee_id','employee_trainings.employee_name','trainings.training_name')
                ->get();
            $data['panelHeading'] = 'Employee Wise Trainings';
            return view('basic.employee-trainings', $data);
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
    }

    public function create()
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $data['path'] = Route::getFacadeRoot()->current()->uri();
            $user = Users::find($user_id);
            $data['user'] = $user;
            $data['companies'] = Company::all();
            $data['trainings'] = Training::where('user_id','=',$user_id)->get();
            return view('basic.add-employee-training', $data);
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $user_id = Session::get('id');
        if(isset($user_id)){
            $employee_ids = $request->input('employee_id');
            $employee_ids = str_replace(' ','',$employee_ids);
            $employee_ids =  explode(',',$employee_ids);

            $employee_names = $request->input('employee_name');
//            $employee_names = str_replace(' ','',$employee_names);
            $employee_names =  explode(',',$employee_names);
//            $employee_names = (array) $employee_names;
//            for($i=0 ;$i<count($employee_names);$i++){
//                if($employee_names[$i][0] == ' '){
//                    $employee_names[$i][0] = '';
//                }
//            }

            $company_id = $request->input('company');
            $training_id = $request->input('training');

            if(count($employee_names) != count($employee_ids)){
                Session::flash('error','Number of Employee IDs and Names entered are not same');
                return Redirect::back();
            }
            else {
                for ($i = 0; $i < count($employee_ids); $i++) {
                    $employee_training = new EmployeeTraining();
                    $employee_training->employee_id = $employee_ids[$i];
                    $employee_training->employee_name = $employee_names[$i];
                    $employee_training->company_id = $company_id;
                    $employee_training->training_id = $training_id;

                    $employee_training->save();
                }
            }
            Session::flash('success','Vacancy added Successfully');
            return Redirect::back();
        }
        else {
            Session::flash('error', 'Your session has expired');
            return Redirect::back();
        }
    }

    public function delete($id)
    {
        $user_id = Session::get('id');
        if (isset($user_id)) {
            $employee_training = EmployeeTraining::find(Crypt::decrypt($id));
            $employee_training->delete();
            Session::flash('Success','Employee Training has been deleted.');
            return Redirect::back();
        }
        else{
            Session::flash('error', 'Your session has ended. Please login to continue.');
            return redirect('/');
        }
    }
}
