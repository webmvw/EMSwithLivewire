
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Employee</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
    			<div class="card-header d-flex justify-content-between">
    				<h3 style="color: #222;font-size:20px;margin:0;">Employee Details - {{$getEmployee->name}}</h3>
    				<a href="{{route('admin.employee')}}" class="btn btn-sm btn-success">Employee List</a>
    			</div>
    			<div class="card-body">
            <div class="row">
              <div class="col-md-3" style="text-align: center;">
                @if($getEmployee->image == null)
                <img src="{{ asset('assets/images/user.png') }}" style="width: 150px;height: 150px;" align="user image">
                @else
                <img src="{{ asset('assets/images/employee/'.$getEmployee->image) }}" style="width: 150px;height: 150px;" align="user image">
                @endif
              </div>
              <div class="col-md-9">
                <table class="table table-sm table-striped table-bordered">
                  <tr>
                    <td>Name </td>
                    <td>{{ $getEmployee->name }}</td>
                  </tr>
                  <tr>
                    <td>Designation</td>
                    <td>{{ $getEmployee->designation->name }}</td>
                  </tr>
                  <tr>
                    <td>Department</td>
                    <td>{{ $getEmployee->department->name }}</td>
                  </tr>
                  <tr>
                    <td>Joining Date</td>
                    <td>{{ date('F j, Y', strtotime($getEmployee->joining_date)) }}</td>
                  </tr>
                  <tr>
                    <td>Current Salary</td>
                    <td>{{ $getEmployee->salary }}/=</td>
                  </tr>
                </table>
              </div>
            </div>
            <br>
            <div class="card">
              <div class="card-header">
                <h3 style="color: #222;font-size:20px;margin:0;">Increment Salary</h3>
              </div>
              <div class="card-body">
                @if(Session::has('increment_success'))
                <p class="text-success">{{Session::get('increment_success')}}</p>
                @endif
                <form wire:submit.prevent="salaryLogStore">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="increment_amount">Increment Amount</label>
                        <input type="text" wire:model="increment_salary" id="increment_amount" class="form-control" placeholder="Amount">
                        @error('increment_salary')<p class="text-danger">{{$message}}</p>@enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="effected_date">Effected Date</label>
                        <input type="date" wire:model="effected_date" id="effected_date" class="form-control">
                        @error('effected_date')<p class="text-danger">{{$message}}</p>@enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <button class="btn btn-success" type="submit" style="margin-top:26px">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <br>
            <div class="card">
              <div class="card-header">
                <h3 style="color: #222;font-size:20px;margin:0;">Salary Increment History</h3>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr class="table-success">
                      <th>SL</th>
                      <th>Previous Salary</th>
                      <th>Increment Amount</th>
                      <th>Present Salary</th>
                      <th>Effected Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $increment_salary_logs = App\Models\EmployeeSalaryLog::where('employee_id', $getEmployee->id)->get();
                    @endphp
                    @foreach($increment_salary_logs as $key=>$value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->previous_salary }}/=</td>
                      <td>{{ $value->increment_salary }}/=</td>
                      <td>{{ $value->present_salary }}/=</td>
                      <td>{{ date('F j, Y', strtotime($value->effected_date)) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
    			</div>
    		</div>
      </div>
    </div>
  </div>
</div>


