
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Department</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="modal fade" id="departmentDeleteModel" tabindex="-1" role="dialog" aria-labelledby="departmentDeleteDataModel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="departmentDeleteDataModel">Delete Item</h5>
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
      <div class="col-md-8 col-sm-8">
        <div class="card">
			<div class="card-header bg-info">
				<span style="color: #fff">Department List</span>
			</div>
			<div class="card-body">
				@if(Session::has('delete_success'))
                <div style="color:green;margin-bottom:15px">{{Session::get('delete_success')}}</div>
                @endif
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>SL</th>
							<th>Department</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($departments as $key=>$value)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$value->name}}</td>
							<td>
								@php
								$getDepartment = App\Models\User::where('department_id', $value->id)->get()->count();
								@endphp
								@if($getDepartment == 0)
								<button wire:click="selectItem({{$value->id}}, 'delete')"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{$departments->links()}}
			</div>
		</div>
      </div>
      <div class="col-md-4 col-sm-4">
      	<div class="card">
			<div class="card-header bg-info">
				<span style="color: #fff">Add Department</span>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
                <div style="color:green;margin-bottom:15px">{{Session::get('success')}}</div>
                @endif
				<form wire:submit.prevent="departmentStore">
					<div class="form-group">
						<label id="name">Name</label>
						<input type="text" wire:model="name" id="name" class="form-control">
						@error('name')<p class="text-danger">{{$message}}</p>@enderror
					</div>
					<button class="btn btn-sm btn-success" type="submit">Submit</button>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>


