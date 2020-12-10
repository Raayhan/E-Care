@extends('layouts.app')
@section('pagetitle', 'Add Doctor')
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
      <li class="nav-item active">
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
            <a class="collapse-item" href="\admin\appointment\request"><i class="fas fa-comment-medical"></i> &nbsp;Appointment Requests <span class="badge badge-danger">1</span></a>

            
        </div>
      </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link" href="\admin\departments">
                <i class="fas fa-clinic-medical"></i>
                <span>DEPARTMENTS</span>
              </a>
      
            </li>


      <!-- Nav Item - Tables -->
      <li class="nav-item">
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

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
       <div id="content">
         <!-- Begin Page Content -->
         <div class="container py-4">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="jumbotron" >
                     
      
                      <div class="card-body">


                          <div class="row justify-content-center" >
                               <h4 class="mdb-color-text">Doctor Registration Form</h4>
                          </div>
                          <div style="margin-bottom:7%;">
                              <hr>
                          </div>
                        
                          <form method="POST" action="{{ route($registerRoute) }}">
                              @csrf
      
                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"autocomplete="name" autofocus>
                                      
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="reg_no" class="col-md-4 col-form-label text-md-right">{{ __('Registration No.') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="reg_no" type="number" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no" value="{{ old('reg_no') }}" autocomplete="reg_no">
      
                                      @error('reg_no')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>
    
                                <div class="col-md-6">
                                  <select name="designation" class="form-control  @error('designation') is-invalid @enderror" id="designation">
                                    <option value="" disabled selected>Select Designation</option>
                                    <option value="Medical Officer">Medical Officer</option>
                                    <option value="Assistant Professor">Assistant Professor</option>
                                    <option value="Associate Professor">Associate Professor</option>
                                    <option value="Professor">Professor</option>

                                  </select>
    
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
    
                                <div class="col-md-6">
                                  <select name="department" class="form-control  @error('department') is-invalid @enderror" id="department">
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach($departments as $department)
                                    <option value="{{$department->name}}">{{$department->name}}</option>
                                  @endforeach


                                  </select>
    
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>
    
                                <div class="col-md-6">
                                    <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" placeholder="Separated by comma" value="{{ old('degree') }}"autocomplete="degree">
                                    
                                    @error('degree')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"autocomplete="phone">
      
                                      @error('phone')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
      
                                  <div class="col-md-6">
                                      <select name="gender" class="form-control  @error('gender') is-invalid @enderror" id="gender">
                                          <option value="" disabled selected>Select Gender</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                          <option value="Others">Others</option>
      
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
      
      
                                  </div>
                              </div>

      

                              <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
      
                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                      <span class="font-weight-bold small" id='message'>
                                  </div>
                              </div>
      
                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-dark-green MyButton">
                                          {{ __('Register') }}
                                      </button>
                                  </div>
                              </div>

                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
                </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
          $('#password, #password-confirm').on('keyup', function () {
            if ($('#password').val() == $('#password-confirm').val()) {
                $('#message').html('Matched <i class="fas fa-check-circle"></i>').css('color', 'green');
              }
            else 
                $('#message').html('Not Matching <i class="fas fa-times-circle"></i>').css('color', 'red');
              }
              );
    </script>   
  
   <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
   
   <script src="{{asset('js/vendor/admin.js')}}"></script>
  
      
@stop
@endsection
