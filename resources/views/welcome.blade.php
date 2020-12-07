@extends('layouts.app')
@section('pagetitle', 'Welcome')
@section('content')
<div class="container front-panel py-4">
    <div class="row justify-content-center">
        <div class="col-md welcome animated zoomIn text-center text-secondary" style="margin-top:10%">
            
            <h6>Welcome to</h6>
            <div class="row justify-content-center">
            
                <h1 class="brown-text">E-Care</h1>
            </div>
           <img style="max-width:20%" src="{{asset('img/front.png')}}" alt="">
           <p style="margin-top:5%">An advanced online digital health service</p>
           <div class="row justify-content-center">
                <button onclick="window.location.href='/login'" class="btn btn-light-green">LOGIN</button>
                <button onclick="window.location.href='/patient/register'" class="btn btn-dark-green">REGISTER</button>
           </div>
        </div>
        <div class="col-md welcome">
            <div class="row justify-content-center">
                <img style="max-width:45%;margin-top:5%" class="animated slideInRight mb-4" src="{{asset('img/health.jpg')}}" alt="">
            </div>
            
            <h3 class="text-secondary text-center animated zoomIn">Your Health Our Services</h3>
        </div>

    </div>
</div>

@endsection

