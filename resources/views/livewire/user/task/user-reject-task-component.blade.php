
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
    				<h3 style="color: #222;font-size:20px;margin:0;">Reject Task</h3>
    				<a href="{{route('user.task.list')}}" class="btn btn-sm btn-success">Task list</a>
    			</div>
    			<form wire:submit.prevent="reject">
            <div class="card-body">
              @if(Session::has('reject_success'))
              <div class="alert alert-success" role="alert">{{Session::get('reject_success')}}</div>
              @endif
              <div class="form-group">
                <label>Reject Reason</label>
                <textarea cols="80" rows="8" wire:model="reject_reason" class="form-control"></textarea>
                @error('reject_reason')<p class="text-danger">{{$message}}</p>@enderror
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit">Reject</button>
            </div>
          </form>
    		</div>
      </div>
    </div>
  </div>
</div>


