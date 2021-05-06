
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Task</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
    			<div class="card-header d-flex justify-content-between">
    				<h3 style="color: #222;font-size:20px;margin:0;">Edit Task</h3>
    				<a href="{{route('admin.task')}}" class="btn btn-sm btn-success">Task list</a>
    			</div>
    			<form wire:submit.prevent="tastUpdate">
            <div class="card-body">
              @if(Session::has('success'))
              <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
              @endif
              <div class="form-group">
                <label for="title">Titla</label>
                <input type="text" wire:model="title" id="title" class="form-control">
                @error('title')<p class="text-danger">{{$message}}</p>@enderror
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" wire:model="start_date" id="start_date" class="form-control">
                    @error('start_date')<p class="text-danger">{{$message}}</p>@enderror
                  </div>
                </div>
                <div class="col-md-3 col-sm-3">
                  <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" wire:model="end_date" id="end_date" class="form-control">
                    @error('end_date')<p class="text-danger">{{$message}}</p>@enderror
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label for="employee_id">Employee</label>
                    <select wire:model="employee_id" class="form-control">
                      <option value="">Select Employee</option>
                      @foreach($employees as $key=>$value)
                      <option value="{{$value->id}}">{{$value->name}} (id_no - {{$value->id_no}})</option>
                      @endforeach
                    </select>
                    @error('employee_id')<p class="text-danger">{{$message}}</p>@enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select wire:model="status" class="form-control">
                  <option value="running">Running</option>
                  <option value="complete">Complete</option>
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea cols="80" rows="8" wire:model="description" class="form-control"></textarea>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit">Update</button>
            </div>
          </form>
    		</div>
      </div>
    </div>
  </div>
</div>


