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
                    aria-expanded="true" aria-controls="appointment">
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


                    <!-- Page Heading -->


                    <div class="jumbotron">
                        <div class="h4 font-weight-bold">
                            <div class="row justify-content-center">
                                <span class=" text-primary font-weight-bold small"><i
                                        class="fas fa-comment-medical"></i> &nbsp;Appointment</span>
                            </div>

                        </div>
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
                                        <div class="row justify-content-center mb-4">
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
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="row justify-content-start">
                                                    <button onclick="goBack()" class="btn btn-unique btn-sm"><i
                                                            class="fas fa-chevron-circle-left"></i> GO BACK</button>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="row justify-content-end">
                                                    <form action="/admin/appointment/view" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $appointment->id }}">

                                                        <input type="submit" name="delete" class="btn btn-danger btn-sm"
                                                            value="DELETE" />
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
