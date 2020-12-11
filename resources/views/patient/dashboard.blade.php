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
          <i class="fas fa-user-secret fa-sm"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Control Panel</div>
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
            
            <a class="collapse-item" href="\patient\appointments\create"><i class="fas fa-file-medical"></i> &nbsp;Make Appointment</a>
            <a class="collapse-item" href="\patient\appointments\all"><i class="fas fa-paste"></i> &nbsp;All Appointments</a>
            <a class="collapse-item" href="\patient\appointments\status"><i class="fas fa-eye"></i> &nbsp;Check Status</a>
           
            
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#department" aria-expanded="true" aria-controls="Branch">
            <i class="fas fa-clinic-medical"></i>
          <span>DEPARTMENTS</span>
        </a>
        <div id="department" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="/patient/department/medicine"><i class="fas fa-pills"></i>&nbsp; Medicine</a>
            <a class="collapse-item" href="/patient/department/cardiology"><i class="fas fa-heartbeat"></i>&nbsp; Cardiology</a>
            <a class="collapse-item" href="/patient/department/cancer"><i class="fas fa-bacterium"></i>&nbsp; Cancer</a>
            <a class="collapse-item" href="/patient/department/diabetics"><i class="fas fa-burn"></i>&nbsp; Diabetics</a>
            <a class="collapse-item" href="/patient/department/neurology"><i class="fas fa-brain"></i>&nbsp; Neurology</a>
            <a class="collapse-item" href="/patient/department/gynaecology"><i class="fas fa-baby"></i>&nbsp; Gynaecology</a>
            <a class="collapse-item" href="/patient/department/child"><i class="fas fa-child"></i>&nbsp; Child/Pediatric</a>
            <a class="collapse-item" href="/patient/department/dermatology"><i class="fas fa-allergies"></i>&nbsp; Dermatology</a>
            <a class="collapse-item" href="/patient/department/urology"><i class="fas fa-bacteria"></i>&nbsp; Urology</a>
            <a class="collapse-item" href="/patient/department/ophthalmology"><i class="fas fa-eye"></i>&nbsp; Ophthalmology</a>
            <a class="collapse-item" href="/patient/department/all"><i class="fas fa-list"></i>&nbsp; All Departments</a>
            
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctor" aria-expanded="true" aria-controls="patient">
            <i class="fas fa-user-md"></i>
          <span>DOCTORS</span>
        </a>
        <div id="doctor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="\patient\doctors\all"><i class="fas fa-user-md"></i> &nbsp;All Doctors</a>
           
            
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Operations
      </div>

   

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="\patient\history">
          <i class="fas fa-history"></i>
          <span>HISTORY</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="\patient\reports">
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
              <a class="collapse-item" href="\patient\profile\settings"><i class="fas fa-user-cog"></i> &nbsp;Account Settings</a>
              <a class="collapse-item" href="\patient\profile\password"><i class="fas fa-user-lock"></i> &nbsp;Change Password</a>
              
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
                      <a onclick="window.location.href='/patient/doctor/all'"> <div class="card border-left-primary shadow h-100 py-2">
                         <div class="card-body">
                           <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doctors</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800">{{$doctor}}</div>
                             </div>
                             <div class="col-auto">
                              <i class="fas fa-user-md fa-2x text-gray-500"></i>
                             </div>
                           </div>
                         </div>
                       </div>
                     </a>
                     </div>
         
                     
                     <div class="col-xl-3 col-md-6 mb-4">
                      <a onclick="window.location.href='/patient/parcel/all'"> <div class="card border-left-success shadow h-100 py-2">
                         <div class="card-body">
                           <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Departments</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800">{{$department}}</div>
                             </div>
                             <div class="col-auto">
                               <i class="fas fa-clinic-medical fa-2x text-gray-500"></i>
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
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
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
                             <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
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
                    <h4 class="text-center">Top Departments</h4>
                    <p class="lead text-center small">Most popular departments based on patient's appointment requests</p>
                    <div class="row mb-4">
                      <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">

                          <div class="card-image">

                            <!-- Content -->
                            <a href="/patient/department/all">
                              <div class="text-white rounded d-flex h-100 mask green darken-4">
                                <div class="first-content align-self-center p-3">
                                  <h4 class="card-title">Medicine</h4>
                                  <p class="">General Medicine</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                  <i class="fas fa-pills fa-3x"></i>
                                </div>
                              </div>
                            </a>

                          </div>



                        </div>
                      <!-- Card -->
                      </div>
                      <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">

                          <div class="card-image">

                            <!-- Content -->
                            <a href="/patient/department/all">
                              <div class="text-white d-flex rounded h-100 mask default-color-dark">
                                <div class="first-content align-self-center p-3">
                                  <h4 class="card-title">Cancer</h4>
                                  <p class="">Cancer Specialists</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                  <i class="fas fa-bacterium fa-3x"></i>
                                </div>
                              </div>
                            </a>

                          </div>



                        </div>
                      <!-- Card -->
                      </div>
                      <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">

                          <div class="card-image">

                            <!-- Content -->
                            <a href="/patient/department/all">
                              <div class="text-white d-flex rounded h-100 mask  deep-orange darken-4">
                                <div class="first-content align-self-center p-3">
                                  <h4 class="card-title">Cardiology</h4>
                                  <p class="">Special Cardiologist</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                  <i class="fas fa-heartbeat fa-3x"></i>
                                </div>
                              </div>
                            </a>

                          </div>



                        </div>
                      <!-- Card -->
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">

                          <div class="card-image">

                            <!-- Content -->
                            <a href="/patient/department/all">
                              <div class="text-white d-flex rounded h-100 mask mdb-color darken-3">
                                <div class="first-content align-self-center p-3">
                                  <h4 class="card-title">Diabetics</h4>
                                  <p class="">Diabetics Specialists</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                  <i class="fas fa-burn fa-3x"></i>
                                </div>
                              </div>
                            </a>

                          </div>



                        </div>
                      <!-- Card -->
                      </div>
                      <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">

                          <div class="card-image">

                            <!-- Content -->
                            <a href="/patient/deparatment/all">
                              <div class="text-white d-flex rounded h-100 mask brown darken-4">
                                <div class="first-content align-self-center p-3">
                                  <h4 class="card-title">Child/Pediatric</h4>
                                  <p class="">Children Specialists</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                  <i class="fas fa-baby fa-3x"></i>
                                </div>
                              </div>
                            </a>

                          </div>



                        </div>
                      <!-- Card -->
                      </div>
                      <div class="col-md-4">
                        <!-- Card -->
                        <div class="card ">

                          <div class="card-image">

                            <!-- Content -->
                            <a href="/patient/department/atment/all">
                              <div class="text-white d-flex rounded h-100 mask purple darken-4">
                                <div class="first-content align-self-center p-3">
                                  <h4 class="card-title">Dermatology</h4>
                                  <p class="">Skin Specialist</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                  <i class="fas fa-allergies fa-3x"></i>
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
                        <a href="/patient/department/all" class="text-danger d-flex flex-row-reverse p-2">
                          <h5 class="waves-effect waves-light font-weight-bold">View more<i class="fas fa-angle-double-right ml-2"></i></h5>
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
