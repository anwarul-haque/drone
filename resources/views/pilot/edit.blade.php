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
              <form method="post" action="{{ route('pilot.update',$drone->id) }}" accept-charset="UTF-8">
                <input name="_method" type="hidden" value="PATCH">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Drone Name</label>
                    <input type="text" name="name" value="{{$drone->name}}" class="form-control" id="name" placeholder="Drone name">
                    </div>
                    <div class="form-group">
                        <label for="model_no">Model Number</label>
                        <input type="text" name="model_no" value="{{$drone->model_no}}" class="form-control" id="model_no" placeholder="Model number">
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <select name="size" class="form-control select2" style="width: 100%;">
                            <option {{ $drone->size == '' ? 'selected':'' }} >Select Size</option>
                            <option {{ $drone->size == '1' ? 'selected':'' }} value='1'>Nano V </option>
                            <option {{ $drone->size == '2' ? 'selected':'' }} value="2">Micro</option>
                            <option {{ $drone->size == '3' ? 'selected':'' }} value="3">Small</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control select2" style="width: 100%;">
                            <option {{ $drone->size == '' ? 'selected':'' }} >Select Type</option>
                            <option {{ $drone->size == '1' ? 'selected':'' }} value='1'>Multiroter V</option>
                            <option {{ $drone->size == '2' ? 'selected':'' }} value="2">Flying-wing</option>
                            <option {{ $drone->size == '3' ? 'selected':'' }} value="3">VTOL-Hybrid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NPNT Complient</label>
                        <select name="is_npnt" class="form-control select2" style="width: 100%;">
                            <option {{ $drone->is_npnt == '0' ? 'selected':'' }} value="0">No</option>
                            <option {{ $drone->is_npnt == '1' ? 'selected':'' }} value='1'>Yes</option>
                        </select>
                    </div>
                   
                </div>
                
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
