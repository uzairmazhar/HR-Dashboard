@extends('layouts.ers-layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('body')
    <div class="content-body">
        <section id="form-control-repeater">
            <form action="{{URL::to('training/update'.'/'.\Illuminate\Support\Facades\Crypt::encrypt($trainings->id))}}" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="file-repeater">Edit Training</h4>
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
                                            <label>Training Title</label>
                                            <input type="text" class="form-control" value="{{$trainings->training_name}}" name="training_title" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Training Hours</label>
                                            <input type="number" class="form-control" value="{{$trainings->training_hours}}" name="training_hours" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Conducted At</label>
                                            <input type="date" class="form-control" value="{{$trainings->training_date}}" name="conducted_at" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" id="bu-form-footer">
                                    <button class="btn btn-success btn-sm" type="submit" style="margin-left: 87%"><i class="la la-paper-plane-o"></i> Submit </button>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4 class="card-title" id="file-repeater">Bank Account Information</h4>--}}
{{--                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>--}}
{{--                                <div class="heading-elements">--}}
{{--                                    <ul class="list-inline mb-0">--}}
{{--                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-content collapse show">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="form row" id="bankContainer">--}}

{{--                                        <div class="form-group col-md-8 mb-2">--}}
{{--                                            <label>Account #</label>--}}
{{--                                            <input type="text" class="form-control"  name="account_number">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4 class="card-title" id="file-repeater">Employment Information</h4>--}}
{{--                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>--}}
{{--                                <div class="heading-elements">--}}
{{--                                    <ul class="list-inline mb-0">--}}
{{--                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-content collapse show">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="form row" id="bu-form">--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Designation</label>--}}
{{--                                            <input type="text" class="form-control" name="designation" required>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Select Grade</label>--}}
{{--                                            <select class="select2 form-control" data-placeholder="Select" name="grade" id="grade" required>--}}
{{--                                                <option></option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Date of Joining</label>--}}
{{--                                            <input type="date" class="form-control"  name="date_of_joining" required>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-12 mb-2">--}}
{{--                                            <label>Select Department <br><small>(Company Name - Business Unit - Department) / Cost Center</small></label>--}}
{{--                                            <select class="select2 form-control" data-placeholder="Select" name="department" id="department" required>--}}
{{--                                                <option></option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Social Security Number</label>--}}
{{--                                            <input type="text" class="form-control"  name="ss_number">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>EOBI Number</label>--}}
{{--                                            <input type="text" class="form-control"  name="eobi_number">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Wage Type</label>--}}
{{--                                            <select class="select2 form-control" name="wage_type" data-placeholder="Select">--}}
{{--                                                <option></option>--}}
{{--                                                <option value="Piece Rated" >Piece Rated</option>--}}
{{--                                                <option value="Daily Rated">Daily Rated</option>--}}
{{--                                                <option value="Monthly Rated" >Monthly Rated</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Salary/Wage Per Month</label>--}}
{{--                                            <input type="text" class="form-control"  name="salary_per_month">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Last date of Working</label>--}}
{{--                                            <input type="date" class="form-control"  name="last_date_of_working">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4 mb-2">--}}
{{--                                            <label>Leaving Reason</label>--}}
{{--                                            <select class="select2 form-control" name="reason_of_leaving" data-placeholder="Select">--}}
{{--                                                <option></option>--}}
{{--                                                <option value="Resign" >Resign</option>--}}
{{--                                                <option value="Terminated" >Terminated</option>--}}
{{--                                                <option value="Dismissed" >Dismissed</option>--}}
{{--                                                <option value="Contract Completed" >Contract Completed</option>--}}
{{--                                                <option value="Expired" >Expired</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
