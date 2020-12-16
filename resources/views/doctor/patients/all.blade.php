@extends('layouts.app')
@section('pagetitle', 'Patients')
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
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appointment" aria-expanded="true" aria-controls="patient">
              <i class="fas fa-prescription"></i>
            <span>APPOINTMENTS</span>
          </a>
          <div id="appointment" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner rounded">
              
              
              <a class="collapse-item" href="\doctor\appointments\all"><i class="fas fa-paste"></i> &nbsp;All Appointments</a>
              <a class="collapse-item" href="\doctor\appointments\requests"><i class="fas fa-comment-medical"></i> &nbsp;Appointment Requests</a>
              <a class="collapse-item" href="\doctor\appointments\status"><i class="fas fa-eye"></i> &nbsp;Check Status</a>
             
              
            </div>
          </div>
        </li>
    
  
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctor" aria-expanded="true" aria-controls="patient">
              <i class="fas fa-hospital-user"></i>
            <span>PATIENTS</span>
          </a>
          <div id="doctor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner rounded">
              
              <a class="collapse-item" href="\doctor\patients\all"><i class="fas fa-hospital-user"></i> &nbsp;All Patients</a>
             
              
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
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Account" aria-expanded="true" aria-controls="Account">
            <i class="fas fa-user-secret"></i>
            <span>ACCOUNT</span></a>
            <div id="Account" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class=" py-2 collapse-inner rounded">
                <a class="collapse-item" href="\doctor\profile\settings"><i class="fas fa-user-cog"></i> &nbsp;Account Settings</a>
                <a class="collapse-item" href="\doctor\profile\password"><i class="fas fa-user-lock"></i> &nbsp;Change Password</a>
                
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
        <h1 class="h3 mb-2 text-gray-800 text-center">Patients</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Patient Informations</h6>
          </div>
          <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold small" role="alert">
                {{session('status')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
             </div>
         @endif

         {{-- Error Alert --}}
         @if(session('error'))
              <div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold small" role="alert">
                  {{session('error')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
         @endif
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%;text-align:center!important;">
                  <thead class="small text-white" style="background:#4285F4 !important;">
                        <tr>
                            
                            
                            <th class="small-table">Patient Name</th>
                            <th class="small-table">Age</th>
                            <th class="small-table">Gender</th>
                            <th class="small-table">Blood Group</th>
                            <th class="small-table">Department</th>
                            <th class="small-table">Status</th>
                            <th class="small-table">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($patients as $patient)

                        <tr>
                         
                          <td>{{ $patient->patient_name }}</td>
                          <td>{{ $patient->patient_age }}</td>
                          <td>{{ $patient->patient_gender }}</td>
                          <td>{{ $patient->patient_blood }}</td>
                          <td>{{ $patient->department_name }}</td>
                          <td><span style="background-color:#c8e6c9; color:#1b5e20;padding:0.5%;" class="font-weight-bold small">{{$patient->status}}</span></td>
                          <td>


                            <form action="/doctor/appointments/conversation" method="GET">
                                          
                                <input type="hidden" name="id" value="{{$patient->id}}">
                                <input class="small btn-primary" type="submit" class="small" value="SEND MESSAGE">
                            </form>
                          </td>
                         

                        </tr>

                          @endforeach
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="small-table">Patient Name</th>
                            <th class="small-table">Age</th>
                            <th class="small-table">Gender</th>
                            <th class="small-table">Blood Group</th>
                            <th class="small-table">Department</th>
                            <th class="small-table">Status</th>
                            <th class="small-table">Action</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
          </div>
        </div>


              </div>
          </div>
    </div>
</div>
@section('scripts')
<script src="{{ asset('js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/vendor/admin.js')}}"></script>
   
    <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>   
@stop
@endsection
