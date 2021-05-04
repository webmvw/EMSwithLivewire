
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
    				<h3 style="color: #222;font-size:20px;margin:0;">Notice Details</h3>
    				<a href="{{route('admin.notice')}}" class="btn btn-sm btn-success">Notice List</a>
    			</div>
    			<div class="card-body">
            <p><b>Title: </b>{{$notice->title}}</p>
            <p><b>Date: </b>{{date('F j, Y', strtotime($notice->date))}}</p>
            <hr>
            <p>{{$notice->description}}</p>
    			</div>
          <div class="card-footer"></div>
    		</div>
      </div>
    </div>
  </div>
</div>


