@extends('layouts.app')
@section('pagetitle', 'Complete Profile')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center login-card">{{ __('Profile Information') }}</div>

                <div class="card-body" style="padding-top:7%;">
                    <h1 class="text-center text-success"><i class="fas fa-check-circle"></i></h1>
                    <h6 class="text-center text-primary font-weight-bold">Complete your profile information :</h6>
                    <form method="POST" action="/patient/profile/complete" style="padding-top:4%;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        

                       
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6" >
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="dob">

                                @error('dob')
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
                            <label for="blood" class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>

                            <div class="col-md-6">
                                <select name="blood" class="form-control  @error('blood') is-invalid @enderror" id="blood">
                                    <option value="" disabled selected>Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>

                                  </select>
                                  @error('blood')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <input type="hidden" name="id" value= "{{Auth::guard('patient')->user()->id}}"/>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-unique MyButton">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
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
@stop
@endsection
