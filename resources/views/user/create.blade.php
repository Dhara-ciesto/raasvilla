@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Register')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')

        <div class="account-pages my-5 pt-sm-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Raas Villa</h5>
                                            <p>Welcome to Raas Villa !!!.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="index">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ URL::asset('/assets/images/logo.svg') }}" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        {{--                         
                                            <h4 class="card-title"></h4>
                                            <p class="card-title-desc"></p> --}}
                        
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#girl" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Girl</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#couple" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Couple</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#child" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Child</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#group" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">Group</span>
                                                </a>
                                            </li>
                                        </ul>
                        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="girl" role="tabpanel">
                                                <div class="p-2">
                                                    <form class="needs-validation" novalidate action="index">
                
                                                        <div class="mb-3">
                                                            <label for="full_name" class="form-label">Full Name<span class="error">*</span></label>
                                                            <input type="text" class="form-control" id="full_name"  autocomplete="off"
                                                                placeholder="Enter Full Name" name="full_name" required>
                                                                @error('full_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address<span class="error">*</span></label>
                                                            <textarea type="text" class="form-control" id="address"  autocomplete="off"                    
                                                                placeholder="Enter Address" name="address" required></textarea>
                                                                @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="DOB" class="form-label">DOB<span class="error">*</span></label>
                                                                    <input type="date" class="form-control" id="dob" autocomplete="off"
                                                                        placeholder="Select Date" name="dob" required>
                                                                        @error('dob')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Mobile No.<span class="error">*</span></label>
                                                                    <input type="text" class="form-control" id="mobile_no" autocomplete="off"
                                                                        placeholder="Mobile No" name="mobile_no" required>
                                                                        @error('mobile_no')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="instagram_id" class="form-label">Instagram ID</label>
                                                                    <input type="text" class="form-control" id="instagram_id" autocomplete="off"
                                                                        placeholder="Instagram ID" name="instagram_id" required>
                                                                        @error('instagram_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Photo</label>
                                                                    <input type="file" class="form-control" id="file" autocomplete="off"
                                                                        name="file" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Email ID</label>
                                                                    <input type="email" class="form-control" id="email_id" autocomplete="off"
                                                                        placeholder="Select Date" name="email_id" required>
                                                                        @error('email_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">ID Proof</label>
                                                                    <input type="file" class="form-control" id="id_proof" autocomplete="off"
                                                                        name="id_proof" required>
                                                                        @error('id_proof')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-3 mt-4">
                                                                    <label for="" class="form-label">Reference By</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="ref_name" autocomplete="off"
                                                                        placeholder="Name" name="ref_name" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Number</label>
                                                                    <input type="text" class="form-control" id="ref_number" autocomplete="off"
                                                                    placeholder="Number" name="ref_number" required>
                                                                        @error('photo')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <div class="mt-4 d-grid">
                                                            <button class="btn btn-primary waves-effect waves-light"
                                                                type="submit">Register</button>
                                                        </div>
                
                                                        <div class="mt-4 text-center">
                                                            <p class="mb-0">By registering you agree to the Raas villa <a href="#"
                                                                    class="text-primary">Terms of Use</a></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="couple" role="tabpanel">
                                                <div class="p-2">
                                                    <form class="needs-validation" novalidate action="index">
                
                                                        <div class="mb-3">
                                                            <label for="full_name" class="form-label">Full Name<span class="error">*</span></label>
                                                            <input type="text" class="form-control" id="full_name"  autocomplete="off"
                                                                placeholder="Enter Full Name" name="full_name" required>
                                                                @error('full_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address<span class="error">*</span></label>
                                                            <textarea type="text" class="form-control" id="address"  autocomplete="off"                    
                                                                placeholder="Enter Address" name="address" required></textarea>
                                                                @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="DOB" class="form-label">DOB<span class="error">*</span></label>
                                                                    <input type="date" class="form-control" id="dob" autocomplete="off"
                                                                        placeholder="Select Date" name="dob" required>
                                                                        @error('dob')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Mobile No.<span class="error">*</span></label>
                                                                    <input type="text" class="form-control" id="mobile_no" autocomplete="off"
                                                                        placeholder="Mobile No" name="mobile_no" required>
                                                                        @error('mobile_no')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="instagram_id" class="form-label">Instagram ID</label>
                                                                    <input type="text" class="form-control" id="instagram_id" autocomplete="off"
                                                                        placeholder="Instagram ID" name="instagram_id" required>
                                                                        @error('instagram_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Photo</label>
                                                                    <input type="file" class="form-control" id="file" autocomplete="off"
                                                                        name="file" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Email ID</label>
                                                                    <input type="email" class="form-control" id="email_id" autocomplete="off"
                                                                        placeholder="Select Date" name="email_id" required>
                                                                        @error('email_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">ID Proof</label>
                                                                    <input type="file" class="form-control" id="id_proof" autocomplete="off"
                                                                        name="id_proof" required>
                                                                        @error('id_proof')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-3 mt-4">
                                                                    <label for="" class="form-label">Reference By</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="ref_name" autocomplete="off"
                                                                        placeholder="Name" name="ref_name" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Number</label>
                                                                    <input type="text" class="form-control" id="ref_number" autocomplete="off"
                                                                    placeholder="Number" name="ref_number" required>
                                                                        @error('photo')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <div class="mt-4 d-grid">
                                                            <button class="btn btn-primary waves-effect waves-light"
                                                                type="submit">Register</button>
                                                        </div>
                
                                                        <div class="mt-4 text-center">
                                                            <p class="mb-0">By registering you agree to the Raas villa <a href="#"
                                                                    class="text-primary">Terms of Use</a></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="child" role="tabpanel">
                                                <div class="p-2">
                                                    <form class="needs-validation" novalidate action="index" action="{{ route('register') }}">
                                                        <input type="hidden" name="">
                                                        <div class="mb-3">
                                                            <label for="full_name" class="form-label">Full Name<span class="error">*</span></label>
                                                            <input type="text" class="form-control" id="full_name"  autocomplete="off"
                                                                placeholder="Enter Full Name" name="full_name" required>
                                                                @error('full_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address<span class="error">*</span></label>
                                                            <textarea type="text" class="form-control" id="address"  autocomplete="off"                    
                                                                placeholder="Enter Address" name="address" required></textarea>
                                                                @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="DOB" class="form-label">DOB<span class="error">*</span></label>
                                                                    <input type="date" class="form-control" id="dob" autocomplete="off"
                                                                        placeholder="Select Date" name="dob" required>
                                                                        @error('dob')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Mobile No.<span class="error">*</span></label>
                                                                    <input type="text" class="form-control" id="mobile_no" autocomplete="off"
                                                                        placeholder="Mobile No" name="mobile_no" required>
                                                                        @error('mobile_no')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="instagram_id" class="form-label">Instagram ID</label>
                                                                    <input type="text" class="form-control" id="instagram_id" autocomplete="off"
                                                                        placeholder="Instagram ID" name="instagram_id" required>
                                                                        @error('instagram_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Photo</label>
                                                                    <input type="file" class="form-control" id="file" autocomplete="off"
                                                                        name="file" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Email ID</label>
                                                                    <input type="email" class="form-control" id="email_id" autocomplete="off"
                                                                        placeholder="Select Date" name="email_id" required>
                                                                        @error('email_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">ID Proof</label>
                                                                    <input type="file" class="form-control" id="id_proof" autocomplete="off"
                                                                        name="id_proof" required>
                                                                        @error('id_proof')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-3 mt-4">
                                                                    <label for="" class="form-label">Reference By</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="ref_name" autocomplete="off"
                                                                        placeholder="Name" name="ref_name" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Number</label>
                                                                    <input type="text" class="form-control" id="ref_number" autocomplete="off"
                                                                    placeholder="Number" name="ref_number" required>
                                                                        @error('photo')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <div class="mt-4 d-grid">
                                                            <button class="btn btn-primary waves-effect waves-light"
                                                                type="submit">Register</button>
                                                        </div>
                
                                                        <div class="mt-4 text-center">
                                                            <p class="mb-0">By registering you agree to the Raas villa <a href="#"
                                                                    class="text-primary">Terms of Use</a></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="group" role="tabpanel">
                                                <div class="p-2">
                                                    <form class="needs-validation" novalidate action="index" action="{{ route('register') }}">
                                                        <input type="hidden" name="">
                                                        <div class="mb-3">
                                                            <label for="full_name" class="form-label">Full Name<span class="error">*</span></label>
                                                            <input type="text" class="form-control" id="full_name"  autocomplete="off"
                                                                placeholder="Enter Full Name" name="full_name" required>
                                                                @error('full_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address<span class="error">*</span></label>
                                                            <textarea type="text" class="form-control" id="address"  autocomplete="off"                    
                                                                placeholder="Enter Address" name="address" required></textarea>
                                                                @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="DOB" class="form-label">DOB<span class="error">*</span></label>
                                                                    <input type="date" class="form-control" id="dob" autocomplete="off"
                                                                        placeholder="Select Date" name="dob" required>
                                                                        @error('dob')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Mobile No.<span class="error">*</span></label>
                                                                    <input type="text" class="form-control" id="mobile_no" autocomplete="off"
                                                                        placeholder="Mobile No" name="mobile_no" required>
                                                                        @error('mobile_no')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="instagram_id" class="form-label">Instagram ID</label>
                                                                    <input type="text" class="form-control" id="instagram_id" autocomplete="off"
                                                                        placeholder="Instagram ID" name="instagram_id" required>
                                                                        @error('instagram_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Photo</label>
                                                                    <input type="file" class="form-control" id="file" autocomplete="off"
                                                                        name="file" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Email ID</label>
                                                                    <input type="email" class="form-control" id="email_id" autocomplete="off"
                                                                        placeholder="Select Date" name="email_id" required>
                                                                        @error('email_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">ID Proof</label>
                                                                    <input type="file" class="form-control" id="id_proof" autocomplete="off"
                                                                        name="id_proof" required>
                                                                        @error('id_proof')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-3 mt-4">
                                                                    <label for="" class="form-label">Reference By</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="email_id" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="ref_name" autocomplete="off"
                                                                        placeholder="Name" name="ref_name" required>
                                                                        @error('full_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label for="mobile_no" class="form-label">Number</label>
                                                                    <input type="text" class="form-control" id="ref_number" autocomplete="off"
                                                                    placeholder="Number" name="ref_number" required>
                                                                        @error('photo')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <div class="mt-4 d-grid">
                                                            <button class="btn btn-primary waves-effect waves-light"
                                                                type="submit">Register</button>
                                                        </div>
                
                                                        <div class="mt-4 text-center">
                                                            <p class="mb-0">By registering you agree to the Raas villa <a href="#"
                                                                    class="text-primary">Terms of Use</a></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                                </div>
                              

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                {{-- <p>Already have an account ? <a href="auth-login" class="fw-medium text-primary">
                                        Login</a> </p> --}}
                                <p>© <script>
                                        document.write(new Date().getFullYear())

                                    </script> Rass Villa </i>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('script')
        <!-- validation init -->
        <script src="{{ URL::asset('/assets/js/pages/validation.init.js') }}"></script>
    @endsection
