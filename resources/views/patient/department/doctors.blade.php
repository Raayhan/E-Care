@extends('layouts.app')
@section('pagetitle', 'Doctors')
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
            <li class="nav-item active">
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
            <li class="nav-item">
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
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid py-4">
                    <div class="jumbotron jumbotron-fluid"
                        style="padding-top:20px!important;padding-bottom:20px!important;">
                        <div class="container">
                            <h4 class="text-center">Department : {{ $department }}</h4>
                            <p class="lead text-center small">Available Doctors</p>
                            <div class="row justify-content-start">
                                <div class="col">
                                    <button onclick="goBack()" class="btn btn-unique btn-sm"><i
                                            class="fas fa-chevron-circle-left"></i> GO BACK</button>
                                </div>
                            </div>

                            <div class="row mb-4">

                                @foreach($doctors as $doctor)
                                    <div class="col-md-4">
                                        <!-- Card -->
                                        <div class="card">

                                            <div class="card-image">

                                                <!-- Content -->

                                                <div class=" rounded d-flex h-100 mask rgba-cyan-slight"
                                                    style="padding:20px;">
                                                    <div class="first-content align-self-center p-3">
                                                        <div class="row justify-content-start" style="padding:15px;">

                                                            <i class="fas fa-user-md fa-3x"></i>

                                                        </div>
                                                        <h5 class="card-title font-weight-bold">Dr.
                                                            {{ $doctor->name }}</h5>
                                                        <p class="mb-0">{{ $doctor->designation }} of
                                                            {{ $doctor->department }}</p>
                                                        <p class="mb-0">{{ $doctor->degree }}</p>
                                                        <p class="mb-0">BMDC REG No. : {{ $doctor->reg_no }}</p>
                                                        <p class="">Gender : {{ $doctor->gender }}</p>

                                                        <form action="/patient/department/doctors" method="POST">

                                                            @csrf
                                                            <input type="hidden" name="doctor_id"
                                                                value="{{ $doctor->id }}">
                                                            <input type="hidden" name="doctor_name"
                                                                value="{{ $doctor->name }}">
                                                            <input type="hidden" name="doctor_designation"
                                                                value="{{ $doctor->designation }}">
                                                            <input type="hidden" name="doctor_gender"
                                                                value="{{ $doctor->gender }}">
                                                            <input type="hidden" name="doctor_reg"
                                                                value="{{ $doctor->reg_no }}">
                                                            <input type="hidden" name="department_name"
                                                                value="{{ $doctor->department }}">
                                                            <input type="hidden" name="doctor_degree"
                                                                value="{{ $doctor->degree }}">


                                                            <button type="submit"
                                                                class="btn btn-danger btn-block MyButton"
                                                                aria-label="Left Align">Make Appointment
                                                                <span class="fas fa-angle-double-right"
                                                                    aria-hidden="true"></span>
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
        $(document).ready(function () {
            $('#example').DataTable();
        });


        function goBack() {
            window.history.back();
        }

    </script>
    @stop
        @endsection
