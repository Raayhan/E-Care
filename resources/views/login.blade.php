@extends('layouts.app')
@section('pagetitle', 'Login')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <h3 class="raleway mb-4">Login to E-Care</h3>
            
    </div>
    <div class="row justify-content-center">
        <!-- Card deck -->
<div class="card-deck" style="padding-left:10%;padding-right:10%;">

    <!-- Card -->
    <div class="card mb-4">
  
      <!--Card image-->
      <div class="view overlay">
        <div class="row justify-content-center">
          <img style="max-width:50%; padding-top:10%;" class="card-img-top" src="{{asset('img/patient.png')}}"
          alt="Card image cap">
        </div>
     
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
  
      <!--Card content-->
      <div class="card-body">
  
        <!--Title-->
        <h4 class="card-title text-center font-weight-bold">Patient</h4><hr>
        <!--Text-->
        <p class="card-text raleway text-center"><small>Login with Patient account</small></p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <a type="button" href="/patient/login" class="btn btn-indigo btn-block">Login</a>
  
      </div>
  
    </div>
    <!-- Card -->
  
    <!-- Card -->
    <div class="card mb-4">
  
      <!--Card image-->
      <div class="view overlay">
        <div class="row justify-content-center">
          <img style="max-width:42%; padding-top:18%;" class="card-img-top" src="{{asset('img/doctor.png')}}"
          alt="Card image cap">
        </div>
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
  
      <!--Card content-->
      <div class="card-body">
  
        <!--Title-->
        <h4 class="card-title text-center font-weight-bold">Doctor</h4><hr>
        <!--Text-->
        <p class="card-text raleway text-center"><small>Login with Doctor account</small></p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <a href="/doctor/login" type="button" class="btn btn-unique btn-block">Login</a>
  
      </div>
  
    </div>
    <!-- Card -->
  
    <!-- Card -->
    <div class="card mb-4">
  
      <!--Card image-->
      <div class="view overlay">
        <div class="row justify-content-center">
          <img style="max-width:55%; padding-top:7%;" class="card-img-top" src="{{asset('img/admin.png')}}"
          alt="Card image cap">
        </div>
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
  
      <!--Card content-->
      <div class="card-body">
  
        <!--Title-->
        <h4 class="card-title text-center font-weight-bold">Admin</h4><hr>
        <!--Text-->
        <p class="card-text raleway text-center"><small>Login with Admin account</small></p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <a href="/admin/login" type="button" class="btn btn-mdb-color btn-block">Login</a>
  
      </div>
  
    </div>
    <!-- Card -->
  
  </div>
  <!-- Card deck -->
    </div>
</div>
</div>
@endsection
