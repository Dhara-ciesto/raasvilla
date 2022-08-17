@extends('layouts.master-without-nav')
@section('title')
    Rass Villa
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1')
Dashboard
@endslot
@slot('title')
Rass Villa
@endslot
        {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles"> --}}
    
    @endcomponent
    <style>
        .wizard .steps>ul {
            opacity: 0;
        }
        .steps .clearfix{
            opacity: 0;
        }
    </style>

        <nav class="navbar navbar-expand-lg navigation fixed-top sticky  bg-primary">
            <div class="container">
                <a class="navbar-logo" href="index">
                    <img src="http://skote-v.laravel.themesbrand.com/assets/images/logo-dark.png" alt=""
                        height="19" class="logo logo-dark">
                    <img src="http://skote-v.laravel.themesbrand.com/assets/images/logo-light.png" alt=""
                        height="19" class="logo logo-light">
                </a>

                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav ms-auto" id="topnav-menu">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                    </ul>

                    <div class="my-2 ms-lg-2">
                        <a href="#" class="btn btn-outline-success w-xs">Sign in</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="section pt-4" id="about">
            <div class="container card mt-5">
                
            </div>

        </section>
        <!-- about section end -->
    @endsection
    @section('script')
        <!-- validation init -->
        <script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <!-- form wizard init -->
        <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    @endsection
