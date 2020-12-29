@extends('layouts.app')
@section('pagetitle', 'Order')
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
                    <i class="fas fa-hospital-user fa-sm"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Patient Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/patient/dashboard">
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

                        <a class="collapse-item" href="\patient\appointments\create"><i class="fas fa-file-medical"></i>
                            &nbsp;Make Appointment</a>
                        <a class="collapse-item" href="\patient\appointments\all"><i class="fas fa-paste"></i> &nbsp;All
                            Appointments</a>
                        <a class="collapse-item" href="\patient\appointments\status"><i class="fas fa-eye"></i>
                            &nbsp;Check Status</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\patient\messages" aria-expanded="true" aria-controls="patient">
                    <i class="fab fa-facebook-messenger"></i>
                    <span>MESSAGES</span>
                </a>

            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#department"
                    aria-expanded="true" aria-controls="Branch">
                    <i class="fas fa-clinic-medical"></i>
                    <span>DEPARTMENTS</span>
                </a>
                <div id="department" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">

                        <a class="collapse-item" href="/patient/department/medicine"><i class="fas fa-pills"></i>&nbsp;
                            Medicine</a>
                        <a class="collapse-item" href="/patient/department/cardiology"><i
                                class="fas fa-heartbeat"></i>&nbsp; Cardiology</a>
                        <a class="collapse-item" href="/patient/department/cancer"><i
                                class="fas fa-bacterium"></i>&nbsp; Cancer</a>
                        <a class="collapse-item" href="/patient/department/diabetics"><i class="fas fa-burn"></i>&nbsp;
                            Diabetics</a>
                        <a class="collapse-item" href="/patient/department/neurology"><i class="fas fa-brain"></i>&nbsp;
                            Neurology</a>
                        <a class="collapse-item" href="/patient/department/gynaecology"><i
                                class="fas fa-baby"></i>&nbsp; Gynaecology</a>
                        <a class="collapse-item" href="/patient/department/child"><i class="fas fa-child"></i>&nbsp;
                            Child/Pediatric</a>
                        <a class="collapse-item" href="/patient/department/dermatology"><i
                                class="fas fa-allergies"></i>&nbsp; Dermatology</a>
                        <a class="collapse-item" href="/patient/department/urology"><i
                                class="fas fa-bacteria"></i>&nbsp; Urology</a>
                        <a class="collapse-item" href="/patient/department/ophthalmology"><i
                                class="fas fa-eye"></i>&nbsp; Ophthalmology</a>
                        <a class="collapse-item" href="/patient/department/all"><i class="fas fa-list"></i>&nbsp; All
                            Departments</a>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctor" aria-expanded="true"
                    aria-controls="patient">
                    <i class="fas fa-user-md"></i>
                    <span>DOCTORS</span>
                </a>
                <div id="doctor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded">

                        <a class="collapse-item" href="\patient\doctors\all"><i class="fas fa-user-md"></i> &nbsp;All
                            Doctors</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="\patient\medicines\all" aria-expanded="true" aria-controls="patient">
                    <i class="fas fa-pills"></i>
                    <span>MEDICINES</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Operations
            </div>
            <li class="nav-item">
                <a class="nav-link" href="\patient\reports\all">
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
                        <a class="collapse-item" href="\patient\profile\settings"><i class="fas fa-user-cog"></i>
                            &nbsp;Account Settings</a>
                        <a class="collapse-item" href="\patient\profile\password"><i class="fas fa-user-lock"></i>
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

                    <div class="jumbotron" style="padding-top:4%;">

                        <div class="row justify-content-center mb-2" style="margin-top:7%">
                            <i class=" text-success fas fa-check-circle fa-4x"></i>
                        </div>
                        <div class="row justify-content-center">

                            <span class="h4 text-center">Order Placed !</span><br>
                        </div>
                        <div class="row justify-content-center mb-5">
                            <span class="h6">Thank you for placing order on E-care.</span>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <!-- Card -->
                                <div class="card">

                                    <div class="card-image">

                                        <!-- Content -->
                                        <a href="/patient/dashboard">
                                            <div class="text-white rounded d-flex h-100 mask  indigo darken-3">
                                                <div class="first-content align-self-center p-3">
                                                    <h4 class="card-title">Dashboard</h4>
                                                    <p class="">Back to Dashboard</p>
                                                </div>
                                                <div class="second-content align-self-center mx-auto text-center">
                                                    <i class="fas fa-home fa-3x"></i>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <div class="col-md-6">
                                <!-- Card -->
                                <div class="card">

                                    <div class="card-image">

                                        <!-- Content -->
                                        <a href="/patient/medicines/all">
                                            <div class="text-white d-flex rounded h-100 mask  red darken-4">
                                                <div class="first-content align-self-center p-3">
                                                    <h4 class="card-title">Order</h4>
                                                    <p class="">Order more medicines</p>
                                                </div>
                                                <div class="second-content align-self-center mx-auto text-center">
                                                    <i class="fas fa-shopping-cart fa-3x"></i>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <!-- Card -->
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


    @stop
        @endsection
