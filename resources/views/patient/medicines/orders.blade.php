@extends('layouts.app')
@section('pagetitle', 'Order')
@section('styles')
<link href="{{ asset('css/vendor/admin.min.css') }}" rel="stylesheet">
@stop
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <i class="fas fa-hospital-user fa-sm"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Patient Panel</div>
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
      <li class="nav-item">
        <a class="nav-link" href="\patient\messages" aria-expanded="true" aria-controls="patient">
            <i class="fab fa-facebook-messenger"></i>
          <span>MESSAGES</span>
        </a>
 
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
 
      <li class="nav-item active">
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
                  @if (session('error'))
                  <div class="alert alert-danger text-center" role="alert">
                       {{ session('error') }}
                  </div>
                  @endif

                  <div class="jumbotron" style="padding-top:4%;">
    
                    <h4 class="text-center" style="margin-bottom:5%;"> Order your medicines</h4>
                   
                    <hr>
                    <div class="table-responsive mb-4">
                       <table class="table table-striped table-bordered table-sm small-table" style="text-align:center!important;">
                         <thead class="info-color white-text text-xsmall">
                           <tr>
                             <th class="small-table" scope="col">Type</th>
                             <th class="small-table" scope="col">Name</th>
                             <th class="small-table" scope="col">Dosage</th>
                             <th class="small-table" scope="col">Status</th>
                         
                            
                           </tr>
                         </thead>
                         <tbody>
                             @foreach ($orders as $order)
                                 
                            
                           <tr>
                             <th class="small-table" scope="row">{{$order->type}}</th>
                             <td class="small-table">{{$order->name}}</td>
                             <td class="small-table">{{$order->dosage}}Mg/Ml</td>
                             <td class="small-table">{{$order->status}}</td>
                          
                             
                           </tr>
                           @endforeach
                      
                         </tbody>
                       </table>
                     </div> 
                     <hr>
                     <div class="row justify-content-center mb-2" style="padding-to:7%;">
                    
                       
                        
                            <div class="col-md-4 ">
                                <form action="/patient/medicines/checkout" method="GET">
                                <input type="hidden" name="patient_id" value="{{Auth::guard('patient')->user()->id}}">
                                <input type="submit" class="btn btn-block btn-primary" value="CHECKOUT">
                            </form>
                            </div>


                    </div>  
                    <div class="row justify-content-center">
                    
                       
                        
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-block btn-unique"><i class="fas fa-chevron-circle-left"></i> GO BACK</button>
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
   
    <script>  function goBack() {
        window.history.back();
          }</script>
@stop
@endsection
