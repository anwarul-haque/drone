<div class="card-body">
    <div class="form-group">
        <label for="name">Drone Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Drone name">
    </div>
    <div class="form-group">
        <label for="model_no">Model Number</label>
        <input type="text" name="model_no" class="form-control" id="model_no" placeholder="Model number">
    </div>
    <div class="form-group">
        <label>Select Pilots</label>
        <select name="size" class="form-control select2" style="width: 100%;">
            <option selected="selected">Select Pilots</option>
            @foreach ($pilots as $pilot)
            <option value= {{$pilot->id}}>{{$pilot->name}} </option>
            @endforeach
           
        </select>
    </div>
    <div class="form-group">
        <label>Type</label>
        <select name="type" class="form-control select2" style="width: 100%;">
            <option selected="selected">Select Type</option>
            <option value='1'>Multiroter V</option>
            <option value="2">Flying-wing</option>
            <option value="3">VTOL-Hybrid</option>
        </select>
    </div>
    <div class="form-group">
        <label>NPNT Complient</label>
        <select name="is_npnt" class="form-control select2" style="width: 100%;">
            <option value="0" selected="selected">No</option>
            <option value='1'>Yes</option>
        </select>
    </div>
   
</div>

<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>