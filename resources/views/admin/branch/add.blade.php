@extends('layouts.app')
@section('pagetitle', 'Add Branch')
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
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Branch" aria-expanded="true" aria-controls="Branch">
        <i class="fas fa-fw fa-code-branch"></i>
        <span>BRANCH</span>
      </a>
      <div id="Branch" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
          
          <a class="collapse-item" href="/admin/branch/branches"><i class="fas fa-list-ul"></i> &nbsp;All Branches</a>
          <a class="collapse-item" href="/admin/branch/add"><i class="fas fa-calendar-plus"></i> &nbsp;Open Branch</a>
            <a class="collapse-item" href="/admin/branch/close"><i class="fas fa-calendar-minus"></i> &nbsp;Close Branch</a>
          
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Customer" aria-expanded="true" aria-controls="Customer">
        <i class="fas fa-fw fa-users"></i>
        <span>CUSTOMER</span>
      </a>
      <div id="Customer" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class=" py-2 collapse-inner rounded">
          
          <a class="collapse-item" href="\admin\customer\customers"><i class="fas fa-list-ul"></i> &nbsp;All Customers</a>
          <a class="collapse-item" href="\admin\customer\add"><i class="fas fa-user-plus"></i> &nbsp;Add Customer</a>
          <a class="collapse-item" href="\admin\customer\block"><i class="fas fa-user-times"></i> &nbsp;Block Customer</a>
          
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
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Shipment" aria-expanded="true" aria-controls="Shipment">
        <i class="fas fa-dolly-flatbed"></i>
        <span>SHIPMENTS</span>
      </a>
      <div id="Shipment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class=" py-2 collapse-inner rounded">
          <a class="collapse-item" href="\admin\shipment\all"><i class="fas fa-list-ul"></i> &nbsp;All Shipments</a>
          <a class="collapse-item" href="\admin\shipment\live"><i class="fas fa-eye"></i> &nbsp;Live Status</a>
          <a class="collapse-item" href="\admin\shipment\request"><i class="fas fa-truck-pickup"></i> &nbsp;Pickup Requests</a>
          <a class="collapse-item" href="\admin\shipment\arrived"><i class="fas fa-download"></i> &nbsp;Arrived Parcels</a>
          <a class="collapse-item" href="\admin\shipment\shipped"><i class="fas fa-calendar-check"></i> &nbsp;Shipped Parcels</a>
          
      </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="\admin\earnings">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>EARNINGS</span></a>
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
         <div class="container-fluid py-4">
  
          <!-- Page Heading -->
          <h4 class="h4 mb-4 text-gray-800 text-center">New Branch</h4>
            
                    <div class="card Poppins">
                      <div class="card-header font-weight-bold">Register Form</div>
                        <div class="card-body branch_add">
                           {{-- Success Alert --}}
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
                          <form method="POST" action="{{ route($registerRoute) }}">
                            <div class="row register-form">
                              
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <input id="name" placeholder="Branch Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                      @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="branch_id" class="form-control  @error('branch_id') is-invalid @enderror" placeholder="Branch ID" name="branch_id" />
                                        @error('branch_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                      </div>
                                    <div class="form-group">
                                      <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                    </div>
                                    <div class="form-group">
                                      <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                      <span class="font-weight-bold small" id='message'>
                                        
                                    </span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone"  />
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                      </div>
                                    <div class="form-group">
                                        <select class="form-control" name="zone"required>
                                          <option class="hidden"  selected disabled>Select Zone</option>
                                          <option value="Dhaka">Dhaka</option>
                                          <option value="Chittagong">Chittagong</option>
                                          <option value="Sylhet">Sylhet</option>
                                          <option value="Comilla">Comilla</option>
                                          <option value="Khulna">Khulna</option>
                                          <option value="Barishal">Barishal</option>
                                          <option value="Rangpur">Rangpur</option>
                                            
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <div class="p-4">
                                            <input type="submit" class="btn btn-unique" style="margin-top:20%;"  value="Add Branch"/>
                                        </div>
                                        
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
