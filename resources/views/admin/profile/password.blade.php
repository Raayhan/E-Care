@extends('layouts.app')
@section('pagetitle', 'Change Password')
@section('styles')
<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@stop
    @section('content')


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-secret fa-sm"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Control Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctor" aria-expanded="true"
                    aria-controls="Branch">
                    <i class="fas fa-user-md"></i>
                    <span>DOCTOR</span>
                </a>
                <div id="doctor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">

                        <a class="collapse-item" href="/admin/doctor/all"><i class="fas fa-list-ul"></i> &nbsp;All
                            Doctors</a>
                        <a class="collapse-item" href="/admin/doctor/add"><i class="fas fa-user-plus"></i> &nbsp;Add
                            Doctor</a>
                        <a class="collapse-item" href="/admin/doctor/remove"><i class="fas fa-user-minus"></i>
                            &nbsp;Remove Doctor</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patient"
                    aria-expanded="true" aria-controls="Customer">
                    <i class="fas fa-fw fa-hospital-user"></i>
                    <span>PATIENT</span>
                </a>
                <div id="patient" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">

                        <a class="collapse-item" href="\admin\patient\all"><i class="fas fa-list-ul"></i> &nbsp;All
                            Patients</a>
                        <a class="collapse-item" href="\admin\patient\add"><i class="fas fa-user-plus"></i> &nbsp;Add
                            Patient</a>
                        <a class="collapse-item" href="\admin\patient\block"><i class="fas fa-user-times"></i>
                            &nbsp;Block Patient</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Operations
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appointment"
                    aria-expanded="true" aria-controls="Shipment">
                    <i class="fas fa-prescription"></i>
                    <span>APPOINTMENTS</span>
                </a>
                <div id="appointment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">
                        <a class="collapse-item" href="\admin\appointment\all"><i class="fas fa-file-prescription"></i>
                            &nbsp;All Appointments</a>
                        <a class="collapse-item" href="\admin\appointment\live"><i class="fas fa-eye"></i> &nbsp;Live
                            Status</a>
                        <a class="collapse-item" href="\admin\appointment\request"><i
                                class="fas fa-comment-medical"></i> &nbsp;Appointment Requests</a>


                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="\admin\departments">
                    <i class="fas fa-clinic-medical"></i>
                    <span>DEPARTMENTS</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="\admin\medicines">
                    <i class="fas fa-pills"></i>
                    <span>MEDICINES</span>
                </a>

            </li>



            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Account"
                    aria-expanded="true" aria-controls="Account">
                    <i class="fas fa-user-secret"></i>
                    <span>ACCOUNT</span></a>
                <div id="Account" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">
                        <a class="collapse-item" href="\admin\profile\view"><i class="fas fa-user-cog"></i>
                            &nbsp;Account Settings</a>
                        <a class="collapse-item" href="\admin\profile\password"><i class="fas fa-user-lock"></i>
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

                <!-- Content Row -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section class="section about-section gray-bg" id="about" style="padding-top:4%;">

                        <div class="container">
                            <div id="accordion">
                                <div class="jumbotron">
                                    @if(session('status'))
                                        <div style="margin-left:10%;margin-right:10%;"
                                            class="alert alert-success alert-dismissible fade show text-center font-weight-bold small"
                                            role="alert">
                                            {{ session('status') }}&nbsp; <i
                                                class="far fa-check-circle"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div style="margin-left:10%;margin-right:10%;"
                                            class="alert alert-danger alert-dismissible fade show text-center font-weight-bold small"
                                            role="alert">
                                            {{ session('error') }}&nbsp; <i
                                                class="fas fa-exclamation-triangle"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="row justify-content-center">
                                        <h4>Change Account Password</h4>
                                    </div>


                                    <form role="form" action="/admin/profile/password" method="POST"
                                        style="padding-left:15%;padding-top:3%;">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">New
                                                Password</label>
                                            <div class="col-md-5">
                                                <input
                                                    class="form-control  {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    name="password" type="password" id="newpassword" autofocus>
                                                @if($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">Confirm
                                                Password</label>
                                            <div class="col-md-5">
                                                <input class="form-control" name="password_confirmation" type="password"
                                                    id="newpassword-confirm">
                                                <span class="font-weight-bold small" id='message'>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-md-3 col-form-label form-control-label text-danger font-weight-bold">Account
                                                Password</label>
                                            <div class="col-md-5">
                                                <input
                                                    class="form-control {{ $errors->has('oldpassword') ? ' is-invalid' : '' }}"
                                                    name="oldpassword" type="password">
                                                @if($errors->has('oldpassword'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-6">
                                                <input type="hidden" name="id"
                                                    value="{{ Auth::guard('admin')->user()->id }}" />
                                                <input type="submit" class="btn btn-unique Mybutton" value="Save">
                                            </div>
                                    </form>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="/admin/profile/view">Change Account Settings</a>
                                </div>
                            </div>
                        </div>
                     </div>
                   </section>
              </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    @section('scripts')
    <script>
        $('#newpassword, #newpassword-confirm').on('keyup', function () {
            if ($('#newpassword').val() == $('#newpassword-confirm').val()) {
                $('#message').html('Matched <i class="fas fa-check-circle"></i>').css('color', 'green');
            } else
                $('#message').html('Not Matching <i class="fas fa-times-circle"></i>').css('color', 'red');
        });

    </script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/admin.js') }}"></script>


    @stop
        @endsection
