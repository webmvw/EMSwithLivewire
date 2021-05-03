
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
				<h3 style="color: #222;font-size:20px;margin:0;">Employee List</h3>
				<a href="{{route('admin.add.employee')}}" class="btn btn-sm btn-success">Add Employee</a>
			</div>
			<div class="card-body">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
              <th>SL</th>
              <th>Image</th>
              <th>Name</th>
              <th>Designation</th>
              <th>Department</th>
              <th>ID No</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Joining Date</th>
              @if(Auth::user()->role_id == 1)
              <th>code</th>
              @endif
              <th width="10%">Action</th>
            </tr>
					</thead>
					<tbody>
						@foreach($employees as $key=>$value)
						<tr>
              <td>{{ $key+1 }}</td>
              <td>
                @if($value->image == null)
                <img src="{{ asset('assets/images/user.png') }}" style="width: 50px;height: 50px;" alt="user image">
                @else
                <img src="{{ asset('assets/images/employee/'.$value->image) }}" style="width: 60px;height: 60px;" alt="user image">
                @endif
              </td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->designation->name }}</td>
              <td>{{ $value->department->name }}</td>
              <td>{{ $value->id_no }}</td>
              <td>{{ $value->phone }}</td>
              <td>{{ $value->address }}</td>
              <td>{{ $value->joining_date }}</td>
              @if(Auth::user()->role_id == 1)
              <td>{{ $value->code }}</td>
              @endif
              <td>
                <a href="{{route('admin.details.employee', $value->id)}}" title="Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                @php
                $checkIncrement = App\Models\EmployeeSalaryLog::where('employee_id', $value->id)->orderBy('id', 'desc')->first();
                $checkIncrementAmount = $checkIncrement->increment_salary;
                @endphp
                @if($checkIncrementAmount == 0)
                <a href="{{route('admin.edit.employee', $value->id)}}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                @endif
              </td>
            </tr>
						@endforeach
					</tbody>
				</table>
				{{$employees->links()}}
			</div>
		</div>
      </div>
    </div>
  </div>
</div>


