@extends('layouts.ers-layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('body')
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$panelHeading}}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Position Title</th>
                                        <th>No. of Positions</th>
                                        <th>Grade</th>
                                        <th>Department</th>
                                        <th>Approved</th>
                                        <th>Expected Hiring Year</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vacancies as $vacanacy)
                                    <tr>
                                        <td>{{$vacanacy->position_title}}</td>
                                        <td>{{$vacanacy->number_of_positions}}</td>
                                        <td>{{$vacanacy->grade_name}}</td>
                                        <td>{{$vacanacy->department_name}}</td>
                                        <td>{{$vacanacy->approved == 1 ? "Yes" : "No"}}</td>
                                        <td>{{$vacanacy->expected_hiring_year}}</td>
                                        <td>{{$vacanacy->filled == 1 ? "Filled" : "Not Filled"}}</td>
                                        <td><a href="{{URL::to('vacancy/update'.'/'.\Illuminate\Support\Facades\Crypt::encrypt($vacanacy->id))}}"><i class="la la-edit"></i></a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('footer')
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
@endsection
