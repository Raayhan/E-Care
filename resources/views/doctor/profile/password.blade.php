@extends('layouts.app')
@section('pagetitle', 'Change Password')
@section('styles')
<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">
@stop
    @section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-md fa-sm"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Doctor Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Service
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appointment"
                    aria-expanded="true" aria-controls="patient">
                    <i class="fas fa-prescription"></i>
                    <span>APPOINTMENTS</span>
                </a>
                <div id="appointment" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">


                        <a class="collapse-item" href="\doctor\appointments\all"><i class="fas fa-paste"></i> &nbsp;All
                            Appointments</a>
                        <a class="collapse-item" href="\doctor\appointments\requests"><i
                                class="fas fa-comment-medical"></i> &nbsp;Appointment Requests</a>
                        <a class="collapse-item" href="\doctor\appointments\status"><i class="fas fa-eye"></i>
                            &nbsp;Check Status</a>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctor" aria-expanded="true"
                    aria-controls="patient">
                    <i class="fas fa-hospital-user"></i>
                    <span>PATIENTS</span>
                </a>
                <div id="doctor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">

                        <a class="collapse-item" href="\doctor\patients\all"><i class="fas fa-hospital-user"></i>
                            &nbsp;All Patients</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\doctor\messages" aria-expanded="true" aria-controls="patient">
                    <i class="fab fa-facebook-messenger"></i>
                    <span>MESSAGES</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="\doctor\prescriptions" aria-expanded="true" aria-controls="patient">
                    <i class="fas fa-file-prescription"></i>
                    <span>PRESCRIPTIONS</span>
                </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Operations
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="\doctor\history">
                    <i class="fas fa-history"></i>
                    <span>HISTORY</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\doctor\reports">
                    <i class="fas fa-file-invoice"></i>
                    <span>REPORTS</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Account"
                    aria-expanded="true" aria-controls="Account">
                    <i class="fas fa-user-secret"></i>
                    <span>ACCOUNT</span></a>
                <div id="Account" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">
                        <a class="collapse-item" href="\doctor\profile\settings"><i class="fas fa-user-cog"></i>
                            &nbsp;Account Settings</a>
                        <a class="collapse-item" href="\doctor\profile\password"><i class="fas fa-user-lock"></i>
                            &nbsp;Change Password</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid py-4">


                    @if(session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="jumbotron jumbotron-fluid"
                        style="padding-top:20px!important;padding-bottom:20px!important;">
                        <div class="container">
                            <h4 class="text-center">Change Account Password</h4>
                            <hr><br><br>
                            <form method="POST" action="\doctor\profile\password">
                                @csrf

                                <div class="form-group row">
                                    <label for="Newpassword"
                                        class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-4">
                                        <input id="Newpassword" type="password"
                                            class="form-control @error('Newpassword') is-invalid @enderror"
                                            name="Newpassword" autofocus>

                                        @error('Newpassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Newpassword-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                    <div class="col-md-4">
                                        <input id="Newpassword-confirm" type="password" class="form-control"
                                            name="Newpassword_confirmation" autocomplete="new-password">
                                        <span class="font-weight-bold small" id='message'>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right text-danger">{{ __('Password') }}</label>

                                    <div class="col-md-4">
                                        <input id="password" placeholder="Enter Account Password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <input type="hidden" name="id"
                                            value="{{ Auth::guard('doctor')->user()->id }}">
                                        <button type="submit" class="btn btn-unique MyButton">
                                            {{ __('Save Changes') }}
                                        </button>
                                    </div>
                                </div>

                            </form>

                            <div class="row justify-content-center" style="margin-top:5%; padding-bottom:10%;">
                                <div class="col-md-3">
                                    <a class="font-weight-bold text-danger small"
                                        href="/patient/profile/delete">Deactivate Account</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="font-weight-bold text-primary small"
                                        href="/patient/profile/settings">Change Account Info</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/admin.js') }}"></script>
    <script>
        $('#Newpassword, #Newpassword-confirm').on('keyup', function () {
            if ($('#Newpassword').val() == $('#Newpassword-confirm').val()) {
                $('#message').html('Matched <i class="fas fa-check-circle"></i>').css('color', 'green');
            } else
                $('#message').html('Not Matching <i class="fas fa-times-circle"></i>').css('color', 'red');
        });

    </script>

    @stop
        @endsection
