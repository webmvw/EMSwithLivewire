
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
    				<h3 style="color: #222;font-size:20px;margin:0;">Task Details</h3>
    				<a href="{{route('user.task.list')}}" class="btn btn-sm btn-success">Task List</a>
    			</div>
    			<div class="card-body">
            <p><b>Title: </b>{{$task->title}}</p>
            <p><b>Dateline: </b>{{date('j F, y', strtotime($task->start_date))}} - {{date('j F, y', strtotime($task->end_date))}}</p>
            <hr>
            <p>{{$task->description}}</p>
    			</div>
          <div class="card-footer"></div>
    		</div>
      </div>
    </div>
  </div>
</div>


