
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Notice</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
			<div class="card-header d-flex justify-content-between">
				<h3 style="color: #222;font-size:20px;margin:0;">Notice List</h3>
				<a href="#" class="btn btn-sm btn-success">Add Notice</a>
			</div>
			<div class="card-body">
				<table class="table table-striped table-sm" id="MyTable">
					<thead>
						<tr>
              <th>SL</th>
              <th>title</th>
              <th>Date</th>
              <th width="10%">Action</th>
            </tr>
					</thead>
					<tbody>
						@foreach($notices as $key=>$value)
						<tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->title }}</td>
              <td>{{ date('F j, Y', strtotime($value->date)) }}</td>
              <td>
                <a href="#" title="Details" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                <a href="#" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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


