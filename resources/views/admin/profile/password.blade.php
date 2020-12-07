@extends('layouts.app')
@section('pagetitle', 'Change Password')
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
              

            <section class="section about-section gray-bg" id="about" style="padding-top:6%;">
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
                        Change Account Password
                      </div>
                      <div class="card-body">
                           <form role="form" action="/admin/profile/password" method="POST" style="padding-left:15%;padding-top:3%;">
                                @csrf
                               <div class="form-group row">
                                   <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                   <div class="col-lg-6">
                                      <input class="form-control  {{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password" type="password" id="newpassword">
                                      @if ($errors->has('password'))
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                         </span>
                                      @endif
                                   </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-lg-3 col-form-label form-control-label">Confirm Password</label>
                                     <div class="col-lg-6">             
                                        <input class="form-control" name="password_confirmation" type="password" id="newpassword-confirm">
                                        <span class="font-weight-bold small" id='message'>
                                        </span>
                                      </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label text-danger font-weight-bold">Account Password</label>
                                    <div class="col-lg-6">
                                        <input class="form-control {{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword" type="password">
                                             @if ($errors->has('oldpassword'))
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('oldpassword') }}</strong>
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
                      <a href="/admin/profile/view">Change Account Settings</a>
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
  <script>
    $('#newpassword, #newpassword-confirm').on('keyup', function () {
      if ($('#newpassword').val() == $('#newpassword-confirm').val()) {
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