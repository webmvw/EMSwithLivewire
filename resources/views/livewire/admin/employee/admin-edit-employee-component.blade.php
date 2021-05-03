
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
            <h3 style="color: #222;font-size:20px;margin:0;">Edit Employee</h3>
            <a href="{{route('admin.employee')}}" class="btn btn-sm btn-success">View Employee</a>
          </div>
          <form wire:submit.prevent="employeeUpdate" enctype="multipart/form-data"> 
              <div class="card-body">
                @if(Session::has('employee_updated'))
                <p class="text-success">{{Session::get('employee_updated')}}</p>
                @endif
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Name <span style="color:red">*</span></label>
                      <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter Name">
                      @error('name')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Email <span style="color:red">*</span></label>
                      <input type="email" wire:model="email" class="form-control" id="email" placeholder="Enter Email">
                      @error('email')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="phone">Phone <span style="color:red">*</span></label>
                      <input type="text" wire:model="phone" class="form-control" id="phone" placeholder="Enter Phone">
                      @error('phone')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="address">Address <span style="color:red">*</span></label>
                      <input type="text" wire:model="address" class="form-control" id="address" placeholder="Enter Address">
                      @error('address')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="gender">Gender <span style="color:red">*</span></label>
                      <select class="form-control" wire:model="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      @error('gender')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="religion">Religion <span style="color:red">*</span></label>
                      <select class="form-control" wire:model="religion" id="religion">
                        <option value="">Select Religion</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddho">Buddho</option>
                        <option value="Khristan">Khristan</option>
                        <option value="Others">Others</option>
                      </select>
                      @error('religion')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="dob">Date Of Birth <span style="color:red">*</span></label>
                      <input type="date" wire:model="dob" class="form-control" id="dob" placeholder="Enter Date Of Birth">
                      @error('dob')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="department">Department <span style="color:red">*</span></label>
                      <select class="form-control" wire:model="department" id="department">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                      </select>
                      @error('department')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="designation">Designation <span style="color:red">*</span></label>
                      <select class="form-control" wire:model="designation" id="designation">
                        <option value="">Select Designation</option>
                        @foreach($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @endforeach
                      </select>
                      @error('designation')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="join_date">Join Date <span style="color:red">*</span></label>
                      <input type="date" wire:model="joining_date" class="form-control" id="join_date" placeholder="Enter Joining Date">
                      @error('joining_date')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="salary">Salary <span style="color:red">*</span></label>
                      <input type="text" wire:model="salary" class="form-control" id="salary" placeholder="Enter Salary">
                      @error('salary')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" wire:model="newImage" id="image" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    @if($newImage)
                    <img src="{{ $newImage->temporaryUrl()}}" align="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                    @elseif($image)
                    <img src="{{ asset('assets/images/employee/'.$image) }}" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                    @else
                    <img src="{{ asset('assets/images/noImage.png') }}" align="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Updated</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


