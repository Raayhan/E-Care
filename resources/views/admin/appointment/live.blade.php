@extends('layouts.app')
@section('pagetitle', 'Check Status')
@section('styles')
<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">
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
            <li class="nav-item active">
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
            <li class="nav-item">
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

                <!-- Begin Page Content -->
                <div class="container-fluid py-4">

                    <div class="card Poppins">
                        <div class="card-header">
                            <div class="row justify-content-center">
                                <span class="font-weight-bold small"></span>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top:12%;height:80vh;">
                            {{-- Success Alert --}}
                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold small"
                                    role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Error Alert --}}
                            @if(session('error'))
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold small"
                                            role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            @endif
                            <div class="row justify-content-center mb-4">
                                <h5 class="mdb-color-text"><i class="fas fa-search"></i> Check status</h5>
                            </div>

                            <form action="/admin/appointment/live" method="POST">

                                @csrf

                                <div class="form-group row">
                                    <label for="appointment_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Appointment ID') }}</label>

                                    <div class="col-md-4">
                                        <input id="appointment_id" type="text"
                                            class="form-control @error('appointment_id') is-invalid @enderror"
                                            name="appointment_id" autofocus>

                                        @error('appointment_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-indigo MyButton" value="Check">
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>

                            </form>

                            <div class="row justify-content-center">
                                <span class="mdb-color-text">Enter appointment ID & view the current status</span>
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

    </script>


    @stop
        @endsection
