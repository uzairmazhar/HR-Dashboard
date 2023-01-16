@extends('layouts.ers-layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('body')
    <div class="content-body">
        <section id="form-control-repeater">
            <form action="{{URL::to('add/employee/training')}}" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="file-repeater">Add Employee's Training</h4>
                                <small style="color: red"><i><b>** </b>Comma separate the employee IDs and Names in case of multiple employees</i></small>
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
                                        <div class="form-group col-md-6 mb-2">
                                            <label>Employee ID(s)</label><br>
                                            <input type="text" class="form-control" value="" name="employee_id" required>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label>Employee Name(s)</label><br>
                                            <input type="text" class="form-control" value="" name="employee_name">
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Company</label>
                                            <select class="select2 form-control" name="company" required>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Training</label>
                                            <select class="select2 form-control" name="training" required>
                                                @foreach($trainings as $training)
                                                    <option value="{{$training->id}}">{{$training->training_name}}</option>
                                                @endforeach
                                            </select>
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
@section('footer')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/extensions/sweet-alerts.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/custom/masking.js')}}" type="text/javascript"></script>
@endsection
