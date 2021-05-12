
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Work Report</h3>
      </div>
    </div>





    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3 style="color: #222;font-size:20px;margin:0;">Edit Work Report</h3>
            <a href="{{route('user.view.workreport')}}" class="btn btn-sm btn-success">Work Report List</a>
          </div>
          <form wire:submit.prevent="workReportUpdate"> 
              <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{Session::get('success')}}</p>
                @endif

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="date" wire:model="date" class="form-control" id="date" placeholder="Enter date">
                      @error('date')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="target">Target</label>
                      <input type="text" wire:model="target" class="form-control" id="target" placeholder="Enter target">
                      @error('target')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="achievement">Achievement</label>
                      <input type="text" wire:model="achievement" class="form-control" id="achievement" placeholder="Enter achievement">
                      @error('achievement')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="work_result">Work Result</label>
                  <input type="text" wire:model="work_result" class="form-control" id="work_result" placeholder="Enter work result">
                  @error('work_result')<p class="text-danger">{{$message}}</p>@enderror
                </div>
                <div class="form-group">
                  <label for="reflection_of_work">Reflection Of Work</label>
                  <input type="text" id="reflection_of_work" wire:model="reflection_of_work" class="form-control" placeholder="Reflection Of Work">
                  @error('reflection_of_work')<p class="text-danger">{{$message}}</p>@enderror
                </div>
                <div class="form-group">
                  <label for="problems_while_working">Problems While Working</label>
                  <input type="text" id="problems_while_working" wire:model="problems_while_working" class="form-control" placeholder="Problems While Working">
                  @error('problems_while_working')<p class="text-danger">{{$message}}</p>@enderror
                </div>
                <div class="form-group">
                  <label for="remarks">Remarks</label>
                  <input type="text" id="remarks" wire:model="remarks" class="form-control" placeholder="Remarks">
                  @error('remarks')<p class="text-danger">{{$message}}</p>@enderror
                </div>
                <div class="form-group">
                  <label for="work_description">Work Description</label>
                  <textarea class="form-control" id="work_description" wire:model="work_description" placeholder="Work Description"></textarea>
                  @error('work_description')<p class="text-danger">{{$message}}</p>@enderror
                </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


