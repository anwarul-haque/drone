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
              <h1 class="m-0 text-dark">Flight Plan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Flight Plan</li>
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
               <a href="{{route('flightPlan.create')}}" class="btn btn-info pull-left">Add Flight Plan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Address</th>
                    <th scope="col">Zip code</th>
                    <th scope="col">Pilot Name</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</h>
                    <th scope="col">Date</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Height</th>
                    <th scope="col">Purpose</th>
                   
                    <th class="text-right" scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($flightPlans as $flightPlan)
                  <tr>
                    <td>{{$flightPlan->address}}</td>
                    <td>{{$flightPlan->zip_code}}</td>
                    <td>
                     
                      @php
                          $userPilot = App\User::find($flightPlan->pilot_id);
                      @endphp
                      {{ $userPilot->name}}
                    </td>
                    <td>{{$flightPlan->lat}}</td>
                    <td>{{$flightPlan->lng}}</td>
                    <td>{{$flightPlan->date}}</td>
                    <td>{{$flightPlan->start_time}}</td>
                    <td>
                      {{$flightPlan->end_time}}
                    </td>
                    <td>
                      {{$flightPlan->height}}
                    </td>
                    <td>
                      
                      @if ($flightPlan->purpose == 1)
                        Photography
                      @endif
                      @if ($flightPlan->purpose == 2)
                      Surveying
                      @endif
                      @if ($flightPlan->purpose == 3)
                      Inspection
                      @endif
                      @if ($flightPlan->purpose == 4)
                      Security Surveillance
                      @endif
                      @if ($flightPlan->purpose == 5)
                      Crowd Monitoring
                      @endif
                      @if ($flightPlan->purpose == 5)
                      Other
                      @endif
                         
                    </td>
                   
                    <td class="text-right">
                      <div class="btn-group">
                        <a href="{{ route('flightPlan.edit',$flightPlan->id) }}" class="btn"><i class="fas fa-edit btn-option-con"></i></a>
                  
                        
                        <form action="{{ route('flightPlan.destroy',$flightPlan->id) }}" method="POST">
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                      {{ $flightPlans->links() }}
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
