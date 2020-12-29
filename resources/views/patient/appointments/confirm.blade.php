@extends('layouts.app')
@section('pagetitle', 'Confirm Appointment')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">
@stop
    @section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/patient/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-secret fa-sm"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Control Panel</div>
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid py-4">
                    <div class="card">
                        <div class="card-header font-weight-bold"></div>
                        <div class="card-body branch_add">

                            <div class="row mb-4">
                                <div class="col-md-10">
                                    <img style="max-width:20%!important;text-align:left;"
                                        src="{{ asset('img/logo.png') }}" alt="">
                                </div>
                                <div class="col-md-2 small">
                                    <span>Appointment ID :</span><span class="mdb-color-text" style="font-weight:bold;">
                                        &nbsp;{{ $appointment_id }}</span>
                                </div>
                            </div>
                            <div class="row justify-content-center Poppins mb-4">

                                <h5 class="mdb-color-text font-weight-bold">Appointment Summary</h5>

                            </div>
                            <div class="row justify-content-center">
                                <div class="barcode">

                                    {!! DNS1D::getBarcodeHTML($appointment_id, "C128",1.4,22) !!}
                                    <p class="small text-center">{{ $appointment_id }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-6">
                                    <h6 class="font-weight-bold"><i class="fas fa-user-md"></i> Doctor Informations</h6>
                                    <hr>
                                    <div class="small">

                                        <span class="font-weight-bold"> Doctor Name : </span><span>Dr.
                                            {{ $doctor_name }}</span><br>
                                        <span class="font-weight-bold"> Designation :
                                        </span><span>{{ $doctor_designation }}</span><br>
                                        <span class="font-weight-bold"> Degree :
                                        </span><span>{{ $doctor_degree }}</span><br>
                                        <span class="font-weight-bold"> BMDC REG No. :
                                        </span><span>{{ $doctor_reg }}</span><br>
                                        <span class="font-weight-bold"> Gender :
                                        </span><span>{{ $doctor_gender }}</span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <h6 class="font-weight-bold"><i class="fas fa-hospital-user"></i> Patient
                                        Informations</h6>
                                    <hr>
                                    <div class="small">
                                        <span class="font-weight-bold"> Patient Name :
                                        </span><span>{{ Auth::guard('patient')->user()->name }}</span><br>
                                        <span class="font-weight-bold"> Department :
                                        </span><span>{{ $department_name }}</span><br>
                                        <span class="font-weight-bold"> Age :
                                        </span><span>{{ Auth::guard('patient')->user()->age }}
                                            Years</span><br>
                                        <span class="font-weight-bold"> Gender :
                                        </span><span>{{ Auth::guard('patient')->user()->gender }}</span><br>
                                        <span class="font-weight-bold"> Blood Group :
                                        </span><span>{{ Auth::guard('patient')->user()->blood }}</span><br>

                                        <hr>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center">

                                <div class="">
                                    <form action="/patient/appointments/confirm" method="GET">
                                        @csrf

                                        <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
                                        <input type="hidden" name="doctor_name" value="{{ $doctor_name }}">
                                        <input type="hidden" name="doctor_designation"
                                            value="{{ $doctor_designation }}">
                                        <input type="hidden" name="doctor_gender" value="{{ $doctor_gender }}">
                                        <input type="hidden" name="department_name" value="{{ $department_name }}">
                                        <input type="hidden" name="patient_id"
                                            value="{{ Auth::guard('patient')->user()->id }}">
                                        <input type="hidden" name="patient_name"
                                            value="{{ Auth::guard('patient')->user()->name }}">
                                        <input type="hidden" name="patient_age"
                                            value="{{ Auth::guard('patient')->user()->age }}">
                                        <input type="hidden" name="patient_gender"
                                            value="{{ Auth::guard('patient')->user()->gender }}">
                                        <input type="hidden" name="patient_blood"
                                            value="{{ Auth::guard('patient')->user()->blood }}">
                                        <input type="hidden" name="status" value="Requested,Pending Approval">

                                        <input type="submit" class="btn btn-dark-green" value="CONFIRM" />
                                    </form>
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


    @stop
        @endsection
