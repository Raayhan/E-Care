@extends('layouts.app')
@section('pagetitle', 'Pickup Requests')
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
      <li class="nav-item active">
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

    
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
     <div id="content">

 

           <!-- Begin Page Content -->
          <div class="container-fluid py-4">

             
                <!-- Page Heading -->
      
        
      <div class="card Poppins">
        <div class="card-header font-weight-bold">
          <div class="row justify-content-center">
            <span class=" text-primary font-weight-bold small"><i class="fas fa-truck-pickup"></i> &nbsp;Pick Up Requests</span>
          </div>
        
        </div>
          <div class="card-body branch_add">
         
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold small" role="alert">
                {{session('status')}} <i class="far fa-check-circle"></i>
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


        @foreach($shipments as $shipment)
      

        <div class="card Poppins mb-4">
          <div class="card-header font-weight-bold">
            <div class="row justify-content-center">
            <span class=" mdb-color-text font-weight-bold small">Request time : {{$shipment->created_at}}</span>
            </div>

          
          </div>
          <div class="card-body branch_add">

            <div class="row justify-content-center">
              <div class="barcode">
              
                {!! DNS1D::getBarcodeHTML($shipment->parcel_id, "C128",1.4,22) !!}
                <p class="small text-center">{{$shipment->parcel_id}}</p>
            </div>
            </div>
            <hr>
            <div class="row justify-content-center mb-4">
              <div class="col-md-4">
                <h6 class="font-weight-bold" ><i class="fas fa-user-check"></i> Sender Informations</h6><hr>
                <div class="small">
                <span class="font-weight-bold"> Name : </span><span>{{$shipment->sender_name}}</span><br>
                <span class="font-weight-bold"> Phone : </span><span>{{$shipment->sender_phone}}</span><br>
                <span class="font-weight-bold"> Address : </span><span>{{$shipment->sender_address}}</span>
                <hr>
                </div>
              </div>
              <div class="col-md-4">
                
                <h6 class="font-weight-bold" ><i class="fas fa-user-tag"></i> Recipient Informations</h6><hr>
                <div class="small">
                  <span class="font-weight-bold"> Name : </span><span>{{$shipment->recipient_name}}</span><br>
                  <span class="font-weight-bold"> Phone : </span><span>{{$shipment->recipient_phone}}</span><br>
                  <span class="font-weight-bold"> Address : </span><span>{{$shipment->recipient_address}}</span>
                  <hr>
                  </div>
              </div>
              <div class="col-md-4">
                <h6 class="font-weight-bold" ><i class="fas fa-box-open"></i> Parcel Informations</h6><hr>
                <div class="small">
                  <span class="font-weight-bold"> Zone : </span><span>{{$shipment->zone}}</span><br>
                <span class="font-weight-bold"> Description : </span><span>{{$shipment->details}}</span><br>
                <span class="font-weight-bold"> Type : </span><span>{{$shipment->type}}</span><br>
                <span class="font-weight-bold"> Delivery : </span><span>{{$shipment->delivery}}</span>
                <hr>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                
                   <span class="h5 raleway">Charge : </span><span class="h5 font-weight-bold mdb-color-text"> &nbsp;{{$shipment->amount}}৳</span>
                
              </div>
             
              <div class="col-md-8">  
                    <form action="/admin/shipment/request"  method="POST">
                      @csrf
                    <div class="row">
                      <div class="col-md-6" style="margin-top:6px;">
                        <select class=" form-control form-control-sm  @error('branch') is-invalid @enderror" name="branch" id="branch">
                          <option class="hidden"  selected disabled>Assign Branch</option>
                          @foreach($branches as $branch)
                            <option value="{{$branch->name}}">{{$branch->name}}</option>
                          @endforeach
                        </select>
                        
                        @error('branch')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <input type="hidden" name="id" value="{{$shipment->id}}">
                      </div>
                      <div class="col-md-3">
                        <input type="submit" name="approve" class="btn btn-indigo btn-sm"   value="Approve"/>
                      </form>
                      </div>
                      <div class="col-md-3">
                        <form action="/admin/shipment/request" method="POST">
                          @csrf
                        <input type="hidden" name="id" value="{{$shipment->id}}">
                         
    
    
    
                          <input type="submit" name="decline" class="btn btn-mdb-color btn-sm"   value="Decline"/>
                        </form>
                    
                      </div>
                    </div>
                    
                    </div>
                

                      
                
                    
                    </div>
              </div>  
                     
                    
                   

                    <div class="d-flex flex-row-reverse">
                      <div class="p-6">
                       <div class="row">            
                    
                     

                   
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
    <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/vendor/admin.js')}}"></script>
    
    
@stop
@endsection