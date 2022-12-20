@extends('layouts.ers-layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
@endsection
@section('body')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Welcome to HR Vacancy Dashboard, kindly navigate the tabs to proceed</h3>
        </div>
    </div>
{{--    <div class="content-body">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                <div class="card pull-up">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media d-flex">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <h3 class="primary">Test</h3>--}}
{{--                                    <h6><a class="grey-blue" href="{{URL::to('vouchers')}}">Total Vouchers</a></h6>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <i class="la la-money primary font-large-2 float-right"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                <div class="progress-bar bg-gradient-x-primary" role="progressbar" aria-valuemin="0"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-3 col-12">--}}
{{--                <div class="card pull-up">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media d-flex">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <h3 class="success">test</h3>--}}
{{--                                    <h6><a class="grey-blue" href="{{URL::to('vouchers/approved')}}">Approved Vouchers</a></h6>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <i class="la la-money success font-large-2 float-right"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                <div class="progress-bar bg-gradient-x-success" role="progressbar" aria-valuemin="0"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                <div class="card pull-up">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media d-flex">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <h3 class="danger">{{count($employee->unapprovedVouchers)}}</h3>--}}
{{--                                    <h6><a class="grey-blue" href="{{URL::to('vouchers/unapproved')}}">Unapproved Vouchers</a></h6>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <i class="la la-money danger font-large-2 float-right"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" aria-valuemin="0" ></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="content-header row">--}}
{{--        <div class="content-header-left col-md-6 col-12 mb-2">--}}
{{--            <h3 class="content-header-title">Your Travel Orders' Summary</h3>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="content-body">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                <div class="card pull-up bg-gradient-directional-primary">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media d-flex">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <h3 class="white">{{count($employee->travelOrders)}}</h3>--}}
{{--                                    <h6><a class="white" href="{{URL::to('travel-orders')}}">Total Travel Orders</a></h6>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <i class="la la-newspaper-o font-large-2 float-right white"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                <div class="progress-bar bg-gradient-x-primary" role="progressbar"  aria-valuemin="0"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-3 col-12">--}}
{{--                <div class="card pull-up bg-gradient-directional-success">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media d-flex">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <h3 class="white">{{count($employee->approvedTravelOrders)}}</h3>--}}
{{--                                    <h6><a class="white" href="{{URL::to('travel-orders/approved')}}">Approved Travel Orders</a></h6>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <i class="la la-newspaper-o white font-large-2 float-right"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                <div class="progress-bar bg-gradient-x-success" role="progressbar"  aria-valuemin="0" ></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                <div class="card pull-up bg-gradient-directional-danger">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="media d-flex">--}}
{{--                                <div class="media-body text-left">--}}
{{--                                    <h3 class="white">{{count($employee->unapprovedTravelOrders)}}</h3>--}}
{{--                                    <h6><a class="white" href="{{URL::to('travel-orders/unapproved')}}">Unapproved Travel Orders</a></h6>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <i class="la la-newspaper-o white font-large-2 float-right"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" aria-valuemin="0"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('footer')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/custom/canvas.js')}}"></script>
@endsection
