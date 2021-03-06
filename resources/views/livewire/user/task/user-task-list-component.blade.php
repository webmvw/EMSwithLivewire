
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
    				<h3 style="color: #222;font-size:20px;margin:0;">Task List</h3>
    			</div>
    			<div class="card-body">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
            @endif
            
    				<table class="table table-striped table-sm" id="MyTable">
    					<thead>
    						<tr>
                  <th>SL</th>
                  <th>title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th width="22%">Action</th>
                </tr>
    					</thead>
    					<tbody>
    						@foreach($tasks as $key=>$value)
    						<tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->title }}</td>
                  <td>{{ date('F j, Y', strtotime($value->start_date)) }}</td>
                  <td>{{ date('F j, Y', strtotime($value->end_date)) }}</td>
                  <td>
                    <a href="{{route('user.task.details', $value->id)}}" class="btn btn-info btn-sm">Details</a>
                    <button wire:click="taskAccept({{$value->id}})" class="btn btn-success btn-sm">Accept</button>
                    <a href="{{route('user.reject.task', $value->id)}}" class="btn btn-danger btn-sm">Reject</a>
                  </td>
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


