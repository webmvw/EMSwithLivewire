
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Work Report</h3>
      </div>
    </div>

    <div class="clearfix"></div>


    <div class="modal fade" id="workreportDeleteModel" tabindex="-1" role="dialog" aria-labelledby="workreportDeleteDataModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="workreportDeleteDataModel">Delete Item</h5>
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



    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
    			<div class="card-header d-flex justify-content-between">
            <h3 style="color: #222;font-size:20px;margin:0;">Work Report List</h3>
            <a href="{{route('user.create.workreport')}}" class="btn btn-sm btn-success">Create Work Report</a>
          </div>
    			<div class="card-body">
            @if(Session::has('delete_success'))
            <div class="alert alert-success" role="alert">{{Session::get('delete_success')}}</div>
            @endif
            
    				<table class="table table-striped table-sm" id="MyTable">
    					<thead>
    						<tr>
                  <th>SL</th>
                  <th>Date</th>
                  <th>Work Description</th>
                  <th>Target</th>
                  <th>Achievement</th>
                  <th>Work Result</th>
                  <th>Reflection of Work</th>
                  <th>Problems While Working</th>
                  <th>Remarks</th>
                  <th width="15%">Action</th>
                </tr>
    					</thead>
    					<tbody>
    						@foreach($workreports as $key=>$value)
    						<tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{date('F j, Y', strtotime($value->date))}}</td>
                  <td>{{ $value->work_description }}</td>
                  <td>{{ $value->target }}</td>
                  <td>{{ $value->achievement }}</td>
                  <td>{{ $value->work_result }}</td>
                  <td>{{ $value->reflection_of_work }}</td>
                  <td>{{ $value->problems_while_working }}</td>
                  <td>{{ $value->remarks }}</td>
                  <td>
                    <a href="#" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <button title="Delete" wire:click="selectItem({{$value->id}}, 'delete')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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


