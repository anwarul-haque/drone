@extends('layouts.main')
<style>
  .btn-option-con:hover{
    color: brown;
  }
</style>
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Registered Operators</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Registered Operators</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    </div>
  </div>
</div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header"> 
              <!-- <h3 class="card-title">DataTable with minimal features &amp; hover style</h3> -->
              <!-- Button trigger modal -->
               <!-- <a href="{{route('pilot.create')}}" class="btn btn-info pull-left">Add Pilot</a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th class="text-right" scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- {{dd($drones)}} --}}
                  @foreach ($operators as $pilot)
                  <tr>
                    <td>{{$pilot->name}}</td>
                    <td>{{$pilot->address}}</td>
                   
                    <td class="text-right">
                      <div class="btn-group">
                        {{-- <a href="{{ route('pilot.edit',$pilot->id) }}" class="btn"><i class="fas fa-edit btn-option-con"></i></a> --}}
                  
                        
                        <form action="{{ route('pilot.update',$pilot->id) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          
                          <button type="submit" class="btn"><i class="fa fa-trash btn-option-con" aria-hidden="true"></i></button>
                      </form>
                         
                      </div>
                    
                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
                <tfoot>
                  <tr>
                  
                    <td></td>
                    <td class="text-right">
                      {{ $operators->links() }}
                    </td>
                  </tr>
               </tfoot>
              </table>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection
