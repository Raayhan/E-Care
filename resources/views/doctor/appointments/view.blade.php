@extends('layouts.app')
@section('pagetitle', 'Appointment')
@section('styles')
<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">
@stop
    @section('content')


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/patient/dashboard">
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


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid py-4">

                    <!-- Page Heading -->

                    <div class="jumbotron" style="padding-top:1%;">

                        <div class="card-body branch_add">

                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold small"
                                    role="alert">
                                    {{ session('status') }} <i class="far fa-check-circle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Error Alert --}}
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold small"
                                    role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @foreach($appointments as $appointment)
                                <div class="card mb-4">
                                    <div class="card-header font-weight-bold">
                                        <div class="row justify-content-center">
                                            <span class=" mdb-color-text font-weight-bold small">Request time :
                                                {{ $appointment->created_at }}</span>
                                        </div>
                                    </div>
                                    <div class="card-body branch_add">

                                        <div class="row justify-content-center">
                                            <div class="barcode">

                                                {!! DNS1D::getBarcodeHTML("10112$appointment->id","C128",1.4,22) !!}
                                                <p class="small text-center">10112{{ $appointment->id }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <h6 class="font-weight-bold"><i class="fas fa-user-check"></i> Doctor
                                                    Informations</h6>
                                                <hr>
                                                <div class="small">
                                                    <span class="font-weight-bold"> Doctor Name :
                                                    </span><span>{{ $appointment->doctor_name }}</span><br>
                                                    <span class="font-weight-bold"> Designation :
                                                    </span><span>{{ $appointment->doctor_designation }}</span><br>
                                                    <span class="font-weight-bold"> Department :
                                                    </span><span>{{ $appointment->department_name }}</span><br>
                                                    <span class="font-weight-bold"> Gender :
                                                    </span><span>{{ $appointment->doctor_gender }}</span>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <h6 class="font-weight-bold"><i class="fas fa-user-tag"></i> Patient
                                                    Informations</h6>
                                                <hr>
                                                <div class="small">
                                                    <span class="font-weight-bold"> Patient Name :
                                                    </span><span>{{ $appointment->patient_name }}</span><br>
                                                    <span class="font-weight-bold"> Age :
                                                    </span><span>{{ $appointment->patient_age }}</span><br>
                                                    <span class="font-weight-bold"> Gender :
                                                    </span><span>{{ $appointment->patient_gender }}</span><br>
                                                    <span class="font-weight-bold"> Blood Group :
                                                    </span><span>{{ $appointment->patient_blood }}</span>

                                                    <hr>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row justify-content-start mb-4">
                                            <div class="col">
                                                <span class="font-weight-bold"> Status : </span><span
                                                    style="background-color:#c8e6c9; color:#1b5e20;padding:0.5%;">{{ $appointment->status }}</span><br>

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <button onclick="goBack()" class="btn btn-unique btn-sm"><i
                                                            class="fas fa-chevron-circle-left"></i> GO BACK</button>
                                                </div>


                                            </div>
                                            <div class="col-md-8">
                                                <div class="row justify-content-end">

                                                    <form action="/doctor/appointments/prescription" method="GET">

                                                        <input type="hidden" name="id" value="{{ $appointment->id }}">

                                                        <input type="submit" class="btn btn-dark-green btn-sm"
                                                            value="PRESCRIPTION" />
                                                    </form>
                                                    <form action="/doctor/appointments/conversation" method="GET">

                                                        <input type="hidden" name="id" value="{{ $appointment->id }}">
                                                        <input type="hidden" name="patient_name"
                                                            value="{{ $appointment->patient_name }}">

                                                        <input type="submit" class="btn btn-indigo btn-sm"
                                                            value="SEND MESSAGE" />
                                                    </form>
                                                    <form action="/doctor/appointments/view" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $appointment->id }}">

                                                        <input type="submit" name="delete" class="btn btn-danger btn-sm"
                                                            value="REMOVE" />
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <!-- End of Page Wrapper -->

    @section('scripts')
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/admin.js') }}"></script>

    <script>
        function goBack() {
            window.history.back();
        }

    </script>
    @stop
        @endsection
