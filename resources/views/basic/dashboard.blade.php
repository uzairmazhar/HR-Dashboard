@extends('layouts.ers-layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
@endsection
@section('body')
    <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2">
            <h3 class="content-header-title">Welcome to HR Vacancy Dashboard, kindly navigate the tabs to proceed</h3>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary">{{$count_vacancies->count}}</h3>
                                    <h6><a class="grey-blue" href="{{URL::to('vacancies')}}">Total Vacancies</a></h6>
                                </div>
                                <div>
                                    <i class="la la-user-secret primary font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">{{$count_filled_vacancies->count}}</h3>
                                    <h6><a class="grey-blue" href="{{URL::to('vacancies')}}">Filled Vacancies</a></h6>
                                </div>
                                <div>
                                    <i class="la la-user-secret success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">{{$count_not_filled_vacancies->count}}</h3>
                                    <h6><a class="grey-blue" href="{{URL::to('vacancies')}}">Unfilled Vacancies</a></h6>
                                </div>
                                <div>
                                    <i class="la la-user-secret danger font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                    <div class="card pull-up">--}}
{{--                        <div class="card-content">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="media d-flex">--}}
{{--                                    <div class="media-body text-left">--}}
{{--                                        <h3 class="primary">{{$count_trainings->count}}</h3>--}}
{{--                                        <h6><a class="grey-blue" href="{{URL::to('trainings')}}">Total Trainings</a></h6>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <i class="la la-money primary font-large-2 float-right"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/custom/canvas.js')}}"></script>
@endsection
