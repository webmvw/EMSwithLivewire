
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
    				<h3 style="color: #222;font-size:20px;margin:0;">Add Notice</h3>
    				<a href="{{route('admin.notice')}}" class="btn btn-sm btn-success">Notice List</a>
    			</div>
          <form wire:submit.prevent="noticeStore">
      			<div class="card-body">
              @if(Session::has('success'))
              <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
              @endif
              <div class="form-group">
                <label for="title">Titla</label>
                <input type="text" wire:model="title" id="title" class="form-control">
                @error('title')<p class="text-danger">{{$message}}</p>@enderror
              </div>
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" wire:model="date" id="date" class="form-control">
                @error('date')<p class="text-danger">{{$message}}</p>@enderror
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea cols="80" rows="8" wire:model="description" class="form-control" id="ckeditor" required></textarea>
                @error('description')<p class="text-danger">{{$message}}</p>@enderror
              </div>
      			</div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit">Submit</button>
            </div>
          </form>
    		</div>
      </div>
    </div>
  </div>
</div>


