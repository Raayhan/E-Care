@extends('layouts.app')
@section('pagetitle', 'Requests')
@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">

@stop
    @section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
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
            <li class="nav-item active">
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
            <li class="nav-item">
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

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid py-4">
                    <div class="jumbotron jumbotron-fluid"
                        style="padding-top:20px!important;padding-bottom:20px!important;">
                        <div class="container">
                            <h4 class="text-center">Patient's Appointment Requests</h4>
                            <p class="lead text-center small">Respond to requests</p>
                            <div class="row justify-content-start">
                                <div class="col">
                                    <button onclick="goBack()" class="btn btn-unique btn-sm"><i
                                            class="fas fa-chevron-circle-left"></i> GO BACK</button>
                                </div>

                            </div>

                            <div class="row mb-4">

                                @foreach($requests as $request)
                                    <div class="col-md-4">
                                        <!-- Card -->
                                        <div class="card">

                                            <div class="card-image">
                                               <!-- Content -->
                                                <div class=" rounded d-flex h-100 mask rgba-cyan-slight"
                                                    style="padding:20px;">
                                                    <div class="first-content align-self-center p-3">
                                                        <div class="row justify-content-start" style="padding:15px;">

                                                            <i class="fas fa-hospital-user fa-3x"></i>

                                                        </div>
                                                        <h5 class="card-title font-weight-bold">
                                                            {{ $request->patient_name }}</h5>
                                                        <p class="mb-0">Age : {{ $request->patient_age }}</p>
                                                        <p class="mb-0">Gender : {{ $request->patient_gender }}</p>
                                                        <p class="mb-0">Blood Group : {{ $request->patient_blood }}
                                                        </p>
                                                        <p class="">Department : {{ $request->department_name }}</p>

                                                    </div>
                                                </div>
                                                <div class="row justify-content-center p-4">
                                                    <div class="col-md-6 mb-4">
                                                        <form action="/doctor/appointments/requests" method="POST">

                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $request->id }}">
                                                            <button type="submit" name="Approve"
                                                                class="btn btn-dark-green btn-block MyButton"
                                                                aria-label="Left Align">Approve
                                                           </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="/doctor/appointments/requests" method="POST">

                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $request->id }}">
                                                            <button type="submit" name="Decline"
                                                                class="btn btn-danger btn-block MyButton"
                                                                aria-label="Left Align">Decline

                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')

    <script src="{{ asset('js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/vendor/admin.js') }}"></script>

    <script type="text/javascript">
        function goBack() {
            window.history.back();
        }

    </script>
    
    @stop
        @endsection
