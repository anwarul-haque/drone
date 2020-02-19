<hr>
<div class="row">
<!-- left column -->
<div class="col-md-3">
  <div class="text-center">
    <img src="{{$user->image? asset('storage/'.$user->image->url):'//placehold.it/100'}}" wodth='100' height='100' class="avatar img-circle" alt="avatar">
    <h6>Upload a different photo...</h6>
    
    <input type="file" name="image" class="form-control">
  </div>
</div>
{{-- {{dd($user)}} --}}
<!-- edit form column -->
<div class="col-md-9 personal-info">
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a> 
    <i class="fa fa-coffee"></i>
    This is an <strong>.alert</strong>. Use this to show important messages to the user.
  </div>
  <h3>Personal info</h3>
  
  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label class="col-lg-3 control-label">Full name:</label>
      <div class="col-lg-8">
        <input name="name" class="form-control" type="text" value="{{$user->name}}">
      </div>
    </div>


    <div class="form-group">
      <label class="col-lg-3 control-label">Email:</label>
      <div class="col-lg-8">
        <input name="email" class="form-control" type="text" value="{{$user->email}}">
      </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label">D.O.B:</label>
        <div class="col-md-8">
          <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-clock"></i></span>
              </div>
              <input name="dob" type="date" class="form-control float-right" id="reservationtime" value="{{$user->dob}}" placeholder="DD/MM/YYYY">
            </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">State:</label>
        <div class="col-md-8">
            <div class="form-group">
                <select name="state" class="form-control select2" style="width: 100%;">
                    <option {{ $user->state == '' ? 'selected':'' }}>Select Type</option>
                    <option {{ $user->state == '1' ? 'selected':'' }} value='1'>MP</option>
                    <option {{ $user->state == '2' ? 'selected':'' }} value="2">Bihar</option>
                    <option {{ $user->state == '3' ? 'selected':'' }} value="3">Delhi</option>
                </select>
            </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">City:</label>
        <div class="col-md-8">
            <div class="form-group">
                <select name="city" class="form-control select2" style="width: 100%;">
                    <option {{ $user->city == '' ? 'selected':'' }}>Select Type</option>
                    <option {{ $user->city == '1' ? 'selected':'' }} value='1'>Bhopal</option>
                    <option {{ $user->city == '2' ? 'selected':'' }} value="2">Patna</option>
                    <option {{ $user->city == '3' ? 'selected':'' }} value="3">Indor</option>
                </select>
            </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">Address:</label>
        <div class="col-lg-8">
          <input name="address" class="form-control" type="text" value="{{$user->address}}" placeholder="Enter address">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">Phone No:</label>
        <div class="col-lg-8">
          <input name="phone" class="form-control" type="text" value="{{$user->phone}}" placeholder="Enter phone no.">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">Gender :</label>
        <div class="col-lg-8">
              <div class="custom-control custom-radio">
              <input name="gender" type="radio" {{ $user->gender == '0' ? 'checked':'' }} value="0" class="custom-control-input form-control" id="defaultGroupExample1" name="groupOfDefaultRadios">
              <label class="custom-control-label" for="defaultGroupExample1">Males </label>
            </div>

            <div class="custom-control custom-radio">
              <input name="gender" {{ $user->gender == '1' ? 'checked':'' }} type="radio" value="1" class="custom-control-input form-control" id="defaultGroupExample2" name="groupOfDefaultRadios">
              <label class="custom-control-label" for="defaultGroupExample2">Female  </label>
            </div>
        </div>
      </div>

    <div class="form-group">
      <label class="col-md-3 control-label"></label>
      <div class="col-md-8">
        <input type="submit" class="btn btn-primary" value="Save Changes">
        <span></span>
        <input type="reset" class="btn btn-default" value="Cancel">
      </div>
    </div>
  </form>
</div>
</div>
</div>
{{-- <hr> --}}