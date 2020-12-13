@extends('layouts.app')
@section('pagetitle', 'Account')
@section('styles')
<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
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
      <li class="nav-item">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctor" aria-expanded="true" aria-controls="Branch">
          <i class="fas fa-user-md"></i>
          <span>DOCTOR</span>
        </a>
        <div id="doctor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="/admin/doctor/all"><i class="fas fa-list-ul"></i> &nbsp;All Doctors</a>
            <a class="collapse-item" href="/admin/doctor/add"><i class="fas fa-user-plus"></i> &nbsp;Add Doctor</a>
            <a class="collapse-item" href="/admin/doctor/remove"><i class="fas fa-user-minus"></i> &nbsp;Remove Doctor</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patient" aria-expanded="true" aria-controls="Customer">
          <i class="fas fa-fw fa-hospital-user"></i>
          <span>PATIENT</span>
        </a>
        <div id="patient" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="\admin\patient\all"><i class="fas fa-list-ul"></i> &nbsp;All Patients</a>
            <a class="collapse-item" href="\admin\patient\add"><i class="fas fa-user-plus"></i> &nbsp;Add Patient</a>
            <a class="collapse-item" href="\admin\patient\block"><i class="fas fa-user-times"></i> &nbsp;Block Patient</a>
            
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appointment" aria-expanded="true" aria-controls="Shipment">
          <i class="fas fa-prescription"></i>
          <span>APPOINTMENTS</span>
        </a>
        <div id="appointment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item" href="\admin\appointment\all"><i class="fas fa-file-prescription"></i> &nbsp;All Appointments</a>
            <a class="collapse-item" href="\admin\appointment\live"><i class="fas fa-eye"></i> &nbsp;Live Status</a>
            <a class="collapse-item" href="\admin\appointment\request"><i class="fas fa-comment-medical"></i> &nbsp;Appointment Requests</a>

            
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
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Account" aria-expanded="true" aria-controls="Account">
          <i class="fas fa-user-secret"></i>
          <span>ACCOUNT</span></a>
          <div id="Account" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner rounded">
              <a class="collapse-item" href="\admin\profile\view"><i class="fas fa-user-cog"></i> &nbsp;Account Settings</a>
              <a class="collapse-item" href="\admin\profile\password"><i class="fas fa-user-lock"></i> &nbsp;Change Password</a>
              
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

        
 <!-- Content Row -->

        <!-- Begin Page Content -->
            <div class="container-fluid py-4">
              <section class="section about-section gray-bg mb-4" id="about">
                <div class="container">
                    <div class="counter">
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                    <h6 class="count h5" data-to="500" data-speed="500">500.00৳</h6>
                                    <p class="m-0px font-w-600">Earnings</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                    <h6 class="count h5" data-to="150" data-speed="150">150.00৳</h6>
                                    <p class="m-0px font-w-600">Due</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                <h6 class="count h5" data-to="190" data-speed="190">500</h6>
                                    <p class="m-0px font-w-600">Completed</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                <h6 class="count h5" data-to="190" data-speed="190">100</h6>
                                    <p class="m-0px font-w-600">Pendings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section about-section gray-bg mb-4 raleway" id="about">
              <div class="container">
                 <div id="accordion">
                    <div class="row">
                        <div class="col-md-6">
                         <!-- Card -->
                            <div class="card gradient-card">
                               <!-- Content -->
                               <div class="blue-grey-text d-flex h-100 mask cloudy-knoxville-gradient">
                                   <div class="first-content align-self-center p-3" style="padding-left:10%!important;">
                                       <p class="card-title">User</p>
                                       <h5 class="lead mb-0 font-weight-bold">{{Auth::guard('admin')->user()->name}}</h5>
                                    </div>
                                    <div class="second-content align-self-center mx-auto text-center">
                                        <i class="fas fa-user-tie fa-3x"></i>
                                    </div>
                                </div>       
                     
                             </div>
                    <!-- Card -->
                        </div>
                        <div class="col-md-6">
                            <!-- Card -->
                             <div class="card gradient-card">
                                 <!-- Content -->
                                 <div class="blue-grey-text d-flex h-100 mask cloudy-knoxville-gradient">
                                     <div class="first-content align-self-center p-3"style="padding-left:10%!important;">
                                          <p class="card-title">Email</p>
                                          <h5 class="lead mb-0 font-weight-bold">{{Auth::guard('admin')->user()->email}}</h5>
                                     </div>
                                     <div class="second-content align-self-center mx-auto text-center">
                                          <i class="fas fa-envelope fa-3x"></i>
                                     </div>
                                  </div>
                              </div>
                              <!-- Card -->
                      
                        </div>

                     </div>


                </div>
             </div>
            </section>

            <section class="section about-section gray-bg" id="about">
              @if(session('status'))
              <div style="margin-left:10%;margin-right:10%;" class="alert alert-success alert-dismissible fade show text-center font-weight-bold small" role="alert">
                  {{session('status')}}&nbsp; <i class="far fa-check-circle"></i>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

            @if(session('error'))
              <div style="margin-left:10%;margin-right:10%;" class="alert alert-danger alert-dismissible fade show text-center font-weight-bold small" role="alert">
                  {{session('error')}}&nbsp; <i class="fas fa-exclamation-triangle"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif
              <div class="container">
                <div id="accordion">
                    <div class="card Poppins">
                      <div class="card-header text-center">
                        Edit Information
                      </div>
                      <div class="card-body">
                           <form role="form" action="/admin/profile/view" method="POST" style="padding-left:15%;padding-top:3%;">
                                @csrf
                               <div class="form-group row">
                                   <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                   <div class="col-lg-6">
                                      <input class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{Auth::guard('admin')->user()->name}}" name="name" type="text">
                                      @if ($errors->has('name'))
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                      @endif
                                   </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                     <div class="col-lg-6">             
                                        <input class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="email" value= {{Auth::guard('admin')->user()->email}}>
                                            @if ($errors->has('email'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                            @endif
                                      </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label text-danger font-weight-bold">Account Password</label>
                                    <div class="col-lg-6">
                                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password">
                                             @if ($errors->has('password'))
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('password') }}</strong>
                                               </span>
                                             @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                      <label class="col-lg-3 col-form-label form-control-label"></label>
                                      <div class="col-lg-6">
                                         <input type="hidden" name="id" value= "{{Auth::guard('admin')->user()->id}}"/>
                                         <input type="submit" class="btn btn-dark-green Mybutton" value= "Save">
                                      </div>
                            </form>
                      </div>
                      <div class="card-footer text-center small">
                      <a href="/admin/profile/password">Change Account Password</a>
                      </div>
                    </div>
                </div>
             </div>
            </section>
          </div>
        </div>
      <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  @section('scripts')
 
    <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/vendor/admin.js')}}"></script>
    
    
@stop
@endsection