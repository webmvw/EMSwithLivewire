
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>User Dashboard </h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-6 col-sm-6  ">
        <div class="card">
          <div class="card-header bg-info">
            <span style="color: #fff">Give your attendance</span>
          </div>
          <div class="card-body">
            @php 
              $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
              $getAttend = App\Models\Attendance::where('employee_id', Auth::user()->id)->where('date', $date->format('Y-m-d'))->first();
            @endphp
            @if($getAttend == null)
            

            <form wire:submit.prevent="attendanceStore">
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" wire:model="date" id="date" class="form-control">
                @error('date')<p class="text-danger">{{$message}}</p>@enderror
              </div>
              <div class="form-group">
                <label for="attend_status">Attend Status</label>
                <select wire:model="attend_status" id="attend_status" class="form-control">
                  <option value="">Select Attend Status</option>
                  <option value="Present">Present</option>
                  <option value="Absent">Absent</option>
                  <option value="Leave">Leave</option>
                </select>
                @error('attend_status')<p class="text-danger">{{$message}}</p>@enderror
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>



            @else
            <center>
              <h3 style="color:green">{{$date->format('F j, Y')}}</h3>
              <h4>Today, you give your attendace successfully!!</h4>
            </center>  
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6"></div>
    </div>
  </div>
</div>