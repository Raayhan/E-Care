@extends('layouts.app')
@section('pagetitle', 'Close Branches')
@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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
        <h1 class="h3 mb-2 text-gray-800 text-center">Close Branches</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4 Poppins">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Branch Informations</h6>
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
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>ID</th>
                            <th>Zone</th>
                            <th>Completed <i class="far fa-check-circle"></i></th>
                            <th>Pending <i class="far fa-clock"></i></th>
                            <th>Earnings</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($branches as $branch)

                        <tr>

                          <td>{{ $branch->name }}</td>
                          <td>{{ $branch->branch_id }}</td>
                          <td>{{ $branch->zone }}</td>
                          <td>{{ $branch->completed }}</td>
                          <td>{{ $branch->pending }}</td>
                          <td>৳ {{ $branch->balance }}</td>
                          <td><form method="POST" action="/admin/branch/close">
                            @csrf
                               <input name="id" type="hidden" value="{{ $branch->id }}">
                               <button type="submit" class="btn btn-sm btn-elegant Mybutton"><i class="fas fa-ban"></i> Close</button>
                            </form>
                        </td>

                        </tr>

                          @endforeach
                       
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>Branch</th>
                          <th>ID</th>
                          <th>Zone</th>
                          <th>Completed <i class="far fa-check-circle"></i></th>
                          <th>Pending <i class="far fa-clock"></i></th>
                          <th>Earnings</th>
                          <th>Action</th>
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
