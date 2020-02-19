<div class="card-body">
    <div class="form-group">
        <label for="name">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="address">
    </div>
    <div class="form-group">
        <label for="zip_code">Zip code</label>
        <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="zip code">
    </div>
    <div class="form-group">
        <label for="start_time">Time</label>
        <input name="start_time" type="date" class="form-control float-right" id="start_time" value="" placeholder="DD/MM/YYYY">
        <input name="end_time" type="date" class="form-control float-right" id="end_time" value="" placeholder="DD/MM/YYYY">
    </div>
    <div class="form-group">
        <label for="haight">Height</label>
        <input name="height" type="text" class="form-control" id="haight" value="" placeholder="height in metres">
    </div>

    <div class="form-group">
        <label>Purpose</label>
        <select name="purpose" class="form-control select2" style="width: 100%;">
            <option selected="selected" value="">Select Size</option>
            <option value='1'>Photography </option>
            <option value="2">Surveying</option>
            <option value="3">Inspection</option>
            <option value="4">Security Surveillance</option>
            <option value="5">Crowd Monitoring</option>
            <option value="6">Other</option>
        </select>
    </div>
    @if (Auth::user()->role == 1)
        <div class="form-group">
            <label>Select Pilots</label>
            <select name="pilot_id" class="form-control select2" style="width: 100%;">
                <option selected="selected">Select Pilots</option>
                @foreach ($pilots as $pilot)
                    <option value= {{$pilot->id}}>{{$pilot->name}} </option>
                @endforeach
            
            </select>
        </div>
    @endif

    <div class="form-group">
        <label>Select Drone</label>
        <select name="drone_id" class="form-control select2" style="width: 100%;">
            <option selected="selected">Select Drone</option>
            @foreach ($drones as $drone)
                <option value= {{$drone->id}}>{{$drone->name}} </option>
            @endforeach
           
        </select>
    </div>
</div>

<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
