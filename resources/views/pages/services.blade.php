@extends('layouts.app')
@section('pagetitle', 'Services')
@section('content')


    <div class="container-fluid py-4" style="background:white!important;">
        <div class="card shadow mb-2 raleway" style=" padding:1%;">
            <h4 class="h3 text-center" style="padding-top:5px;">iParcel Services</h4>
        </div>
    
        <div style="padding:5%;" class=" text-center Poppins text-justified"> iParcel is an advanced digital parcel solution system.
             It made the parcel system management more easier.</div>
        
        <div class="row justify-content-center">
            <img style="max-width:50%" src="{{asset('img/process.png')}}" alt="">
        </div>
        <div style="padding-left:20%;padding-right:20%;">
            <div class="card border-left-primary shadow h-100 py-2" >
                <div class="card-body Poppins">
                  <h6 class="text-center mdb-color-text mb-3">Delivery Charges</h6>
    
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-sm small-table" style="text-align:center!important;">
                    <thead class="primary-color white-text text-xsmall">
                      <tr>
                        <th class="small-table" scope="col">Type/Delivery</th>
                        <th class="small-table" scope="col">Regular(15 Days)</th>
                        <th class="small-table" scope="col">Express(7 Days)</th>
                        <th class="small-table" scope="col">Super Express(2 Days)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="small-table" scope="row">Small (< 5Kg)</th>
                        <td class="small-table">50.00</td>
                        <td class="small-table">80.00</td>
                        <td class="small-table">140.00</td>
                      </tr>
                      <tr>
                        <th class="small-table" scope="row">Medium (< 10Kg)</th>
                        <td class="small-table">70.00</td>
                        <td class="small-table">100.00</td>
                        <td class="small-table">160.00</td>
                      </tr>
                      <tr>
                        <th class="small-table" scope="row">Large (10Kg+)</th>
                        <td class="small-table">110.00</td>
                        <td class="small-table">140.00</td>
                        <td class="small-table">200.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              
                </div>
              </div>
        </div>

        <div class="row justify-content-center" style="margin-top:10%;">
          <div class="h5 font-italic">Thank you for using iParcel</div>
        </div>
    </div>
          


  
@endsection