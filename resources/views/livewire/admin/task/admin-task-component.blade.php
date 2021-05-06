
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Task</h3>
      </div>
    </div>


    <div class="modal fade" id="taskDeleteModel" tabindex="-1" role="dialog" aria-labelledby="taskDeleteDataModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="taskDeleteDataModel">Delete Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are You Sure to Delete this?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button wire:click="deleteItem" type="button" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>



    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
    			<div class="card-header d-flex justify-content-between">
    				<h3 style="color: #222;font-size:20px;margin:0;">Task List</h3>
    				<a href="{{route('admin.create.task')}}" class="btn btn-sm btn-success">Create Task</a>
    			</div>
    			<div class="card-body">
            @if(Session::has('delete_success'))
            <div style="color:green;margin-bottom:15px">{{Session::get('delete_success')}}</div>
            @endif
    				<table class="table table-striped table-sm" id="MyTable">
    					<thead>
    						<tr>
                  <th>SL</th>
                  <th>title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Accept Status</th>
                  <th width="14%">Action</th>
                </tr>
    					</thead>
    					<tbody>
    						@foreach($tasks as $key=>$value)
    						<tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->title }}</td>
                  <td>{{ date('F j, Y', strtotime($value->start_date)) }}</td>
                  <td>{{ date('F j, Y', strtotime($value->end_date)) }}</td>
                  <td>{{$value->status}}</td>
                  <td>{{$value->accept_status}}</td>
                  <td>
                    <a href="{{route('admin.details.task', $value->id)}}" title="Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="{{route('admin.edit.task', $value->id)}}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <button wire:click="selectItem({{$value->id}}, 'delete')" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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


