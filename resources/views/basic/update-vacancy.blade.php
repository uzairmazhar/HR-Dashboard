@extends('layouts.ers-layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('body')
    <div class="content-body">
        <section id="form-control-repeater">
            <form action="{{URL::to('vacancy/update'.'/'.\Illuminate\Support\Facades\Crypt::encrypt($vacancy->id))}}" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="file-repeater">Edit Vacancy</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form row" id="bu-form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group col-md-8 mb-2">
                                            <label>Position Title</label>
                                            <input type="text" class="form-control" value="{{$vacancy->position_title}}" name="position_title" required>
                                        </div>
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Total Positions</label>--}}
{{--                                            <input type="number" class="form-control" value="{{$vacancy->number_of_positions}}" name="total_positions" required>--}}
{{--                                        </div>--}}
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Department</label>
                                            <select class="select2 form-control" name="department" required>
                                                <option value="{{$vacancy->department_id}}">{{$vacancy->department_name}}</option>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Grade</label>
                                            <select class="select2 form-control" name="grade" required>
                                                <option value="{{$vacancy->grade_id}}">{{$vacancy->grade_name}}</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Salary <small>(MAX)</small></label>
                                            <input type="text" class="form-control" value="{{$vacancy->salary_max}}" name="salary_max" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Salary <small>(MIN)</small></label>
                                            <input type="text" class="form-control" value="{{$vacancy->salary_min}}" name="salary_min" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Vacancy Approved</label>
                                            <select class="select2 form-control" value="{{$vacancy->approved}}" name="approved"  required>
                                                @if($vacancy->approved == '1')
                                                    <option value="1" >Yes</option>
                                                    <option value="0" >No</option>
                                                @else
                                                    <option value="0"> No</option>
                                                    <option value="1" >Yes</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Expected Hiring Year</label>
                                            <select class="select2 form-control" name="hiring_year" required>
                                                @foreach($years as $year)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Expected Hiring Month</label>
                                            <input type="number" class="form-control" value="{{$vacancy->expected_hiring_month}}" name="hiring_month" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Filled</label>
                                            <select onchange="display()" class="select2 form-control" value="{{$vacancy->filled}}" name="filled" id='filled'>
                                                @if($vacancy->filled == 1)
                                                    <option value="1" >Yes</option>
                                                    <option value="0" >No</option>
                                                @else
                                                    <option value="0"> No</option>
                                                    <option value="1" >Yes</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-2" id='filled_at' style="display: none">
                                            <label>Filled At</label>
                                            <input type="date" class="form-control" value="{{date('Y-m-d', strtotime(date('Y-m-d')))}}" name="filled_at" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" id="bu-form-footer">
                                    <button class="btn btn-success btn-sm" type="submit" style="margin-left: 87%"><i class="la la-paper-plane-o"></i> Submit </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
<script>
    window.onload = function (){
        if (document.getElementById('filled').value == 1) {
            document.getElementById('filled_at').style.display = "block";
        } else {
            document.getElementById('filled_at').style.display = "none";
        }
    }

    function display() {
        if (document.getElementById('filled').value == 1) {
            document.getElementById('filled_at').style.display = "block";
        } else {
            document.getElementById('filled_at').style.display = "none";
        }
    }
</script>
@section('footer')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/extensions/sweet-alerts.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/custom/masking.js')}}" type="text/javascript"></script>
@endsection
