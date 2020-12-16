@extends('layouts.app')
@section('pagetitle', 'Dashboard')
@section('styles')
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
      <li class="nav-item active">
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
      <li class="nav-item">
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

             
              @if (session('status'))
                   <div class="alert alert-success text-center" role="alert">
                        {{ session('status') }}
                   </div>
              @endif
              <!-- Content Row -->
              <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                  <a onclick="window.location.href='/doctor/patients/all'"> <div class="card border-left-primary shadow h-100 py-2">
                     <div class="card-body">
                       <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Patients</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$appointments}}</div>
                         </div>
                         <div class="col-auto">
                          <i class="fas fa-hospital-user fa-2x text-gray-500"></i>
                         </div>
                       </div>
                     </div>
                   </div>
                 </a>
                 </div>
     
                 
                 <div class="col-xl-3 col-md-6 mb-4">
                  <a onclick="window.location.href='/doctor/appointments/all'"> <div class="card border-left-success shadow h-100 py-2">
                     <div class="card-body">
                       <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Appointments</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$appointments}}</div>
                         </div>
                         <div class="col-auto">
                           <i class="fas fa-prescription fa-2x text-gray-500"></i>
                         </div>
                       </div>
                     </div>
                   </div>
                 </a>
                 </div>
     
                 
                 <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-info shadow h-100 py-2">
                     <div class="card-body">
                       <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active</div>
                           <div class="row no-gutters align-items-center">
                             <div class="col-auto">
                             <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$active}}</div>
                             </div>
                            
                           </div>
                         </div>
                         <div class="col-auto">
                           <i class="fas fa-file-prescription fa-2x text-gray-500"></i>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
     
                 <!-- Pending Requests Card Example -->
                 <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-danger shadow h-100 py-2">
                     <div class="card-body">
                       <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Completed</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$completed}}</div>
                         </div>
                         <div class="col-auto">
                           <i class="fas fa-check-circle fa-2x text-gray-500"></i>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
             </div>
             <div class="jumbotron jumbotron-fluid" style="padding-top:20px!important;padding-bottom:20px!important;">
                <div class="container">
                  <h4 class="text-center">E-Care Doctor Panel</h4>
                  <p class="lead text-center small">Provide E-Prescription Service to your patients online</p>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <!-- Card -->
                      <div class="card">

                        <div class="card-image">

                          <!-- Content -->
                          <a href="/doctor/appointments/requests">
                            <div class="text-white rounded d-flex h-100 mask  primary-color-dark">
                              <div class="first-content align-self-center p-3">
                                <h4 class="card-title">Appointment Requests</h4>
                                <p class="">Respond to your patient's appointment requests.</p>
                              </div>
                              <div class="second-content align-self-center mx-auto text-center">
                                <i class="fas fa-comment-medical fa-3x"></i>
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
                          <a href="/doctor/prescriptions">
                            <div class="text-white d-flex rounded h-100 mask  red darken-4">
                              <div class="first-content align-self-center p-3">
                                <h4 class="card-title">E-Prescriptions</h4>
                                <p class="">Create a new E-Prescription.View all your E-Prescriptions.</p>
                              </div>
                              <div class="second-content align-self-center mx-auto text-center">
                                <i class="fas fa-prescription fa-3x"></i>
                              </div>
                            </div>
                          </a>

                        </div>



                      </div>
                    <!-- Card -->
                    </div>

                  </div>

                  <div class="row mb-4">
                    <div class="col-md-6">
                      <!-- Card -->
                      <div class="card">

                        <div class="card-image">

                          <!-- Content -->
                          <a href="/doctor/patients/all">
                            <div class="text-white rounded d-flex h-100 mask info-color-dark">
                              <div class="first-content align-self-center p-3">
                                <h4 class="card-title">Manage Patients</h4>
                                <p class="">Manage all your patients.</p>
                              </div>
                              <div class="second-content align-self-center mx-auto text-center">
                                <i class="fas fa-hospital-user fa-3x"></i>
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
                          <a href="/doctor/messages">
                            <div class="text-white d-flex rounded h-100 mask  unique-color">
                              <div class="first-content align-self-center p-3">
                                <h4 class="card-title">Messages</h4>
                                <p class="">View or Send messages to your patients</p>
                              </div>
                              <div class="second-content align-self-center mx-auto text-center">
                                <i class="fab fa-facebook-messenger fa-3x"></i>
                              </div>
                            </div>
                          </a>

                        </div>



                      </div>
                    <!-- Card -->
                    </div>

                  </div>

                  <div class="row justify-content-center">
                    <!-- Link -->
                      <a href="/services" class="text-danger d-flex flex-row-reverse p-2">
                        <h5 class="waves-effect waves-light font-weight-bold">More Services<i class="fas fa-angle-double-right ml-2"></i></h5>
                      </a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/vendor/admin.js')}}"></script>
   
    
@stop
@endsection
