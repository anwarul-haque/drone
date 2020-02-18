@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Drone</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Drone</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form role="form" id="register_drone" novalidate="novalidate"> -->
              <form method="post" action="{{ route('flightPlan.update',$flightPlan->id) }}" accept-charset="UTF-8">
                <input name="_method" type="hidden" value="PATCH">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                
                <div class="card-body">
                  <div class="form-group">
                      <label for="name">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="address" value="{{$flightPlan->address}}">
                  </div>
                  <div class="form-group">
                      <label for="zip_code">Zip code</label>
                    <input type="text" value="{{$flightPlan->zip_code}}" name="zip_code" class="form-control" id="zip_code" placeholder="zip code">
                  </div>
                  <div class="form-group">
                    {{-- {{dd($flightPlan->start_time)}} --}}
                      <label for="start_time">Time</label>
                      <input name="start_time" value="{{$flightPlan->start_time}}" type="date" class="form-control float-right" id="start_time" value="" placeholder="DD/MM/YYYY">
                      <input name="end_time" type="date" value="{{$flightPlan->end_time}}" class="form-control float-right" id="end_time" value="" placeholder="DD/MM/YYYY">
                  </div>
                  <div class="form-group">
                      <label for="haight">Height</label>
                      <input name="height" type="text" value="{{$flightPlan->height}}" class="form-control" id="haight" value="" placeholder="height in metres">
                  </div>
              {{-- {{dd($flightPlan->purpose)}} --}}
                  <div class="form-group">
                      <label>Purpose</label>
                      <select name="purpose" class="form-control select2" style="width: 100%;">
                          <option {{$flightPlan->purpose == '' ? 'selected':''}} value='' >Select Size</option>
                          <option {{$flightPlan->purpose == '1' ? 'selected':''}} value='1'>Photography </option>
                          <option {{$flightPlan->purpose == '2' ? 'selected':''}} value="2">Surveying</option>
                          <option {{$flightPlan->purpose == '3' ? 'selected':''}} value="3">Inspection</option>
                          <option {{$flightPlan->purpose == '4' ? 'selected':''}} value="4">Security Surveillance</option>
                          <option {{$flightPlan->purpose == '5' ? 'selected':''}} value="5">Crowd Monitoring</option>
                          <option {{$flightPlan->purpose == '6' ? 'selected':''}} value="6">Other</option>
                      </select>
                  </div>
              </div>
              
              <!-- /.card-body -->
                
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
@endsection
