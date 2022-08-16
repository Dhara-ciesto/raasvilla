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
                <form id="contact" enctype="multipart/form-data" action="{{ route('user.register.store') }}" method="POST" redirect="{{ route('user.register.index') }}">
                    @csrf
                    <div>
                        <h3 class="d-none">Personal Details</h3>
                        <section>
                            <div class="container">
                                <div id="form_section_">
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-xl-10">
                                            <div class="mb-3">
                                                <div class="row mb-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="account_holder_name">Full name<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control required"
                                                                name="full_name" id="full_name"
                                                                value="{{ old('full_name') }}" placeholder="Full Name">
                                                            @error('full_name')
                                                                <p class="error text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="mobile_no" class="form-label">Mobile No.<span
                                                                class="error">*</span></label>
                                                                <input type="text" class="form-control" id="mobile_no"
                                                                autocomplete="off" placeholder="Mobile No"
                                                                name="mobile_no" required>
                                                                @error('mobile_no')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address<span
                                                                    class="error">*</span></label>
                                                            <textarea type="text" class="form-control required" id="address" autocomplete="off" placeholder="Enter Address"
                                                                name="address"></textarea>
                                                            @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                        <label for="email_id" class="form-label"><h5>Refrence By</h5></label>
                                                    <br>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="email_id" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="ref_name"
                                                                autocomplete="off" placeholder="Name" name="ref_name"
                                                                required>
                                                            @error('ref_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="mobile_no" class="form-label">Number</label>
                                                            <input type="text" class="form-control" id="ref_number"
                                                                autocomplete="off" placeholder="Number" name="ref_number"
                                                                required>
                                                            @error('ref_number')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="mobile_no" class="form-label">Photo</label>
                                                            <input type="file" class="form-control" id="file"
                                                                autocomplete="off" name="file" required>
                                                            @error('full_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="email_id" class="form-label">Email ID</label>
                                                            <input type="email" class="form-control" id="email_id"
                                                                autocomplete="off" placeholder="Select Date"
                                                                name="email_id" required>
                                                            @error('email_id')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="mobile_no" class="form-label">ID Proof</label>
                                                            <input type="file" class="form-control" id="id_proof"
                                                                autocomplete="off" name="id_proof" required>
                                                            @error('id_proof')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="mb-3">
                                                            <label for="email_id" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="ref_name"
                                                                autocomplete="off" placeholder="Name" name="ref_name"
                                                                required>
                                                            @error('full_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="mb-3">
                                                            <label for="mobile_no" class="form-label">Number</label>
                                                            <input type="text" class="form-control" id="ref_number"
                                                                autocomplete="off" placeholder="Number" name="ref_number"
                                                                required>
                                                            @error('photo')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end container -->
                        </section>
                        <h3 class="d-none">Banking details</h3>
                        <section>
                            <div class="container">
                                <div id="form_section_">
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-xl-10">
                                            <div class="mb-3">
                                                <div class="row mb-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="name_label">Get entry as ?</label> <br>
                                                            <div class="row">
                                                                <div class="col-md-1 p-sm-3">
                                                                    <input type="button" class="btn btn-outline-primary"  id="couple" name="entry_as" value="Couple">
                                                                </div>
                                                                <div class="col-md-1 p-sm-3">
                                                                    <input type="button" class="btn btn-outline-primary"  id="group" name="entry_as" value="Group">
                                                                </div>
                                                                <div class="col-md-1 p-sm-3">
                                                                    <input type="button" class="btn btn-outline-primary"  id="girl" name="entry_as" value="Girl">
                                                                </div>
                                                                <input type="hidden" name="entry_type" id="entry_type">
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div id="entry_as_girl" class="toHide" style="display: none;">
                                                                <label class="form-label">Details</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="instagram_id">Member Name <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="girl_member_name" 
                                                                                autocomplete="off" placeholder="Name"
                                                                                name="girl_member_name" required>
                                                                            @error('girl_member_name')
                                                                            <p class="error text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="instagram_id">Mobile No.<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="girl_mobile_no" 
                                                                                autocomplete="off" placeholder="Mobile No"
                                                                                name="girl_mobile_no" required>
                                                                            @error('girl_mobile_no')
                                                                            <p class="error text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="instagram_id">Instagram ID <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="instagram_id"
                                                                                autocomplete="off" placeholder="Instagram ID"
                                                                                name="instagram_id" required>
                                                                            @error('instagram_id')
                                                                            <p class="error text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">DOB<span
                                                                                    class="error">*</span></label>
                                                                            <input type="date" class="form-control" id="dob"
                                                                                autocomplete="off" placeholder="Select Date"
                                                                                name="dob" required>
                                                                            @error('dob')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">Photo<span
                                                                                    class="error">*</span></label>
                                                                            <input type="file" class="form-control" id="mem_photo"
                                                                                autocomplete="off" 
                                                                                name="photo" required>
                                                                            @error('photo')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">ID Proof<span
                                                                                    class="error">*</span></label>
                                                                            <input type="file" class="form-control" id="id_proof"
                                                                                autocomplete="off"
                                                                                name="id_proof" required>
                                                                            @error('id_proof')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="entry_as_couple" class="toHide" style="display: none;">

                                                                <br>
                                                                <label class="form-label"><h5>Memeber 1 Details</h5></label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="instagram_id">Member Name <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="mem1_name" 
                                                                                autocomplete="off" placeholder="Name"
                                                                                name="mem1_name" required>
                                                                            @error('mem1_name')
                                                                            <p class="error text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="instagram_id">Mobile No.<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="mem1_mobile_no" 
                                                                                autocomplete="off" placeholder="Mobile No"
                                                                                name="mem1_mobile_no" required>
                                                                            @error('mem1_mobile_no')
                                                                            <p class="error text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="instagram_id">Instagram ID <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="mem1_insta_id"
                                                                                autocomplete="off" placeholder="Instagram ID"
                                                                                name="mem1_insta_id" required>
                                                                            @error('mem1_insta_id')
                                                                            <p class="error text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">DOB<span
                                                                                    class="error">*</span></label>
                                                                            <input type="date" class="form-control" id="mem1_dob"
                                                                                autocomplete="off" placeholder="Select Date"
                                                                                name="mem1_dob" required>
                                                                            @error('mem1_dob')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">Photo<span
                                                                                    class="error">*</span></label>
                                                                            <input type="file" class="form-control" id="mem1_photo"
                                                                                autocomplete="off" 
                                                                                name="mem1_photo" required>
                                                                            @error('mem1_photo')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">ID Proof<span
                                                                                    class="error">*</span></label>
                                                                            <input type="file" class="form-control" id="mem1_id_proof"
                                                                                autocomplete="off"
                                                                                name="mem1_id_proof" required>
                                                                            @error('mem1_id_proof')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label class="form-label"><h5>Memeber 2 Details</h5></label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="email_id" class="form-label">Name</label>
                                                                            <input type="text" class="form-control" id="mem2 _name"
                                                                                autocomplete="off" placeholder="Name" name="mem2_name"
                                                                                required>
                                                                            @error('mem2_name')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="mobile_no" class="form-label">Mobile No</label>
                                                                            <input type="text" class="form-control" id="mem2_mobile_no"
                                                                                autocomplete="off" placeholder="Number" name="mem2_mobile_no"
                                                                                required>
                                                                            @error('mem2_mobile_no')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="instagram_id">Instagram ID <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="mem2_insta_id"
                                                                                autocomplete="off" placeholder="Instagram ID"
                                                                                name="mem2_insta_id" required>
                                                                            @error('mem2_insta_id')
                                                                            <p class="error text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">DOB<span
                                                                                    class="error">*</span></label>
                                                                            <input type="date" class="form-control" id="mem2_dob"
                                                                                autocomplete="off" placeholder="Select Date"
                                                                                name="mem2_dob" required>
                                                                            @error('mem2_dob')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">Photo<span
                                                                                    class="error">*</span></label>
                                                                            <input type="file" class="form-control" id="mem2_photo"
                                                                                autocomplete="off" 
                                                                                name="mem2_photo" required>
                                                                            @error('mem2_photo')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="DOB" class="form-label">ID Proof<span
                                                                                    class="error">*</span></label>
                                                                            <input type="file" class="form-control" id="mem2_id_proof"
                                                                                autocomplete="off"
                                                                                name="mem2_id_proof" required>
                                                                            @error('mem2_id_proof')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="repeater">
                                                                    <div data-repeater-list="childs" class="outer">
                                                                        <label class="form-label" id="label_group"><h5>Child Details</h5></label>
                                                                        <div data-repeater-item class="row">
                                                                            <div class="col-md-6 col-sm-5">
                                                                                <div class="mb-3">
                                                                                    <label for="instagram_id">Name <span class="text-danger">*</span></label>
                                                                                    <input type="text" class="form-control" id="child_name" 
                                                                                        autocomplete="off" placeholder="Name"
                                                                                        name="child_name" required>
                                                                                    @error('child_name')
                                                                                    <p class="error text-danger">{{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-5 col-sm-5">
                                                                                <div class="mb-3">
                                                                                    <label for="instagram_id">DOB <span class="text-danger">*</span></label>
                                                                                    <input type="date" class="form-control" id="child_dob" 
                                                                                        autocomplete="off" placeholder="Name"
                                                                                        name="child_dob" required>
                                                                                    @error('child_dob')
                                                                                    <p class="error text-danger">{{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-1 col-sm-1 delete mt-2 pt-sm-4 float-sm-end float-md-end my-sm-3">
                                                                                <span data-repeater-delete class="" type="button"><i class='bx bxs-trash-alt bx-xs error'></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 text-end">
                                                                        <button data-repeater-create type="button" class="btn btn-outline-primary mt-3 mt-lg-0"><i class='bx bx-plus'></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="entry_as_group" class="toHide" style="display: none;">
                                                                <div class="repeater" id="repeater">

                                                                    <div data-repeater-list="group_a" class="outer">
                                                                        <label class="form-label" id="label_group"><h5>Memeber 1 Details</h5></label>
                                                                        <div data-repeater-item class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="instagram_id">Member Name <span class="text-danger">*</span></label>
                                                                                    <input type="text" class="form-control" id="member_name" 
                                                                                        autocomplete="off" placeholder="Name"
                                                                                        name="member_name" required>
                                                                                    @error('member_name')
                                                                                    <p class="error text-danger">{{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="instagram_id">Mobile No.<span class="text-danger">*</span></label>
                                                                                    <input type="text" class="form-control" id="mobile_no" 
                                                                                        autocomplete="off" placeholder="Mobile No"
                                                                                        name="mobile_no" required>
                                                                                    @error('mobile_no')
                                                                                    <p class="error text-danger">{{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="DOB" class="form-label">DOB<span
                                                                                            class="error">*</span></label>
                                                                                    <input type="date" class="form-control" id="dob"
                                                                                        autocomplete="off" placeholder="Select Date"
                                                                                        name="dob" required>
                                                                                    @error('dob')
                                                                                        <div class="text-danger">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="instagram_id">Instagram ID <span class="text-danger">*</span></label>
                                                                                    <input type="text" class="form-control"
                                                                                        autocomplete="off" placeholder="Instagram ID"
                                                                                        name="mem_insta_id" required>
                                                                                    @error('mem_insta_id')
                                                                                    <p class="error text-danger">{{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="DOB" class="form-label">Photo<span
                                                                                            class="error">*</span></label>
                                                                                    <input type="file" class="form-control" id="mem_photo"
                                                                                        autocomplete="off" 
                                                                                        name="mem_photo" required>
                                                                                    @error('dob')
                                                                                        <div class="text-danger">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="DOB" class="form-label">ID Proof<span
                                                                                            class="error">*</span></label>
                                                                                    <input type="file" class="form-control" id="mem_id_proof"
                                                                                        autocomplete="off"
                                                                                        name="mem_id_proof" required>
                                                                                    @error('dob')
                                                                                        <div class="text-danger">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 delete my-3">
                                                                                <span data-repeater-delete class="float-end" type="button"><i class='bx bxs-trash-alt bx-xs error'></i></span>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-12 text-end">
                                                                        <button data-repeater-create type="button" class="btn btn-outline-primary mt-3 mt-lg-0"><i class='bx bx-plus'></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
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
        <script>
            var form = $("#contact");
            form.validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
                rules: {
                    mobile_no: {
                        required: true,
                        minlength:10,
                        maxlength:10,
                        number: true
                    },
                    ref_number: {
                        required: false,
                        number: true
                    }
                }
            });
            form.children("div").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                onStepChanging: function(event, currentIndex, newIndex) {
                    // console.log('newIndex', currentIndex)
                    if(currentIndex == 0 && !$('#entry_type').val()){
                        $('.actions').hide();
                    }
                    if (currentIndex < newIndex) {

                        form.validate().settings.ignore = ":disabled,:hidden";
                        // return form.valid();
                        var validation = form.valid()
                        if (validation) {
                            return true;
                        } else {
                            $('.actions').show();
                            return false;
                        }
                    }
                    return true;
                },
                onFinishing: function(event, currentIndex) {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    var validation = form.valid()
                    if (validation) {
                        ajaRequest(form);
                        const Toast = Swal.mixin({
                                toast: true
                                , position: 'top-end'
                                , showConfirmButton: false
                                , timer: 3000
                                , timerProgressBar: true
                                , didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success'
                                , title: 'User Registred Successsfully'
                            });
                        return true;

                    } else {
                        $('.actions').show();
                        return false
                    }
                },
                onFinished: function(event, currentIndex) {
                    // window.location = form.attr("redirect");
                }
            });
            function ajaRequest(form){
                let form_data = $('#contact')[0];
                form_data = new FormData(form_data);
                $.ajax({
                    type: 'POST',
                    url: '{{route("user.register.store")}}',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if(res.success){
                            // console.log(res)
                            $('#updateRecord').val(res.data);
                        }
                        // console.log("res",res);
                    },
                    error: function() {
                        console.log("Signup was unsuccessful");
                    }
                });
            }
            $("[name=entry_as]").click(function() {
                $('.toHide').hide();
                $('.actions').show();
                // console.log($("#entry_as_" + $(this).attr('id')));
                $('#entry_type').val($(this).attr('id'));
                if($(this).attr('id') == 'group'){
                    $("input[name='group_a[0][member_name]']").attr('readonly' , true);
                    $("input[name='group_a[0][mobile_no]']").attr('readonly' , true);
                    $("input[name='group_a[0][member_name]']").val($('#full_name').val());
                    $("input[name='group_a[0][mobile_no]']").val($('#mobile_no').val());
                }else if($(this).attr('id') == 'couple'){
                    $("#mem1_name").attr('readonly' , true);
                    $("#mem1_mobile_no").attr('readonly' , true);
                    $("#mem1_name").val($('#full_name').val());
                    $("#mem1_mobile_no").val($('#mobile_no').val());
                }else if($(this).attr('id') == 'girl'){
                    $("#girl_member_name").attr('readonly' , true);
                    $("#girl_mobile_no").attr('readonly' , true);
                    $("#girl_member_name").val($('#full_name').val());
                    $("#girl_mobile_no").val($('#mobile_no').val());
                }
                $("#entry_as_" +  $(this).attr('id')).show('slow');
            });
  
        </script>
        @if (Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true
                , position: 'top-end'
                , showConfirmButton: false
                , timer: 3000
                , timerProgressBar: true
                , didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        
            Toast.fire({
                icon: 'success'
                , title: "{{ Session::get('success') }}"
            })
        
        </script>
        @endif
    @endsection
