@extends('layouts.app')
@section('pagetitle', 'Contact')
@section('content')
<div class="jumbotron text-center bg-danger" style="padding-top: 20px!important;padding-bottom: 20px!important;">
    <h2 class="text-white">Emergency Contact</h2> 
</div>
<div class="container">
   
    <div class="row justify-content-center" style="
    margin-right: 0px!important;
    margin-left: 0px!important;
">
      <div class="col-md-8">
          <div class="jumbotron">
              <div class="row justify-content-center">
                  <div class="col-md-8">
                      <h1 class="text-center text-danger"><i class="fas fa-exclamation-triangle"></i></h1>
                  </div>
                  
                  
              </div>
              <div class="row justify-content-center">
                  <div class="col-md-8">
                      <h6 class="text-center text-secondary mb-4">Please fill up the form to get emergency services</h6><hr>
                  </div>
                  
              
              </div>
              
              <form action="chat.html">
                  <div class="form-group row justify-content-center mb-0">
                      <div class="col-md-8">
                          <label class="font-weight-bold label" for="name">Name</label>
                      </div>
                  </div>
                  <div class="form-group row justify-content-center">
                      <div class="col-md-8">
                      <input
                      class="form-control"
                      type="text"
                      name="name"
                      id="name"
                      placeholder="Enter Name"
                      required autofocus
                  />
                      </div>
                  </div>
                  <div class="form-group row justify-content-center mb-0">
                      <div class="col-md-8">
                          <label class="font-weight-bold label" for="section">Section</label>
                      </div>
                  </div>
                  <div class="form-group row justify-content-center mb-4">
                      <div class="col-md-8">
                          <select class="form-control" name="section" id="section"required>
                              <option selected disabled>Select Section</option>
                              <option value="JavaScript">JavaScript</option>
                              <option value="Python">Python</option>
                              <option value="PHP">PHP</option>
                              <option value="C#">C#</option>
                              <option value="Ruby">Ruby</option>
                              <option value="Java">Java</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row justify-content-center">
                      <div class="col-md-8">
                          <button type="submit" class="btn btn-block btn-primary text-white">Join Chat</button>
                      </div>
                  </div>
              </form>

          </div>
      </div>
    </div>
</div>
  
@endsection