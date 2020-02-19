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
                <li class="breadcrumb-item active">Create</li>
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
                <h3 class="card-title">Register Pilot</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form role="form" id="register_drone" novalidate="novalidate"> -->
              <form method="post" action="{{ route('pilot.store') }}" accept-charset="UTF-8">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="card-body">
                  <div class="form-group">
                    <label>Select Pilots</label>
                    <select name="pilot_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Select Pilots</option>
                        @foreach ($pilots as $pilot)
                        <option value= {{$pilot->id}}>{{$pilot->name}} </option>
                        @endforeach
                      
                    </select>
                  </div>
                </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
