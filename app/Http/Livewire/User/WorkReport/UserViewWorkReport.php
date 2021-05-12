<?php

namespace App\Http\Livewire\User\WorkReport;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkReport;

class UserViewWorkReport extends Component
{

	public $selected_item;

	public function selectItem($itemId, $action){
		$this->selected_item = $itemId;
		if($action == 'delete'){
			$this->dispatchBrowserEvent('openWorkReportDeleteModel');
		}
	}

	public function deleteItem(){
		WorkReport::destroy($this->selected_item);
		session()->flash('delete_success', 'Work Report has been deleted Success');
		$this->dispatchBrowserEvent('closeWorkReportDeleteModel');
	}


    public function render()
    {
    	$workreports = WorkReport::orderBy('id', 'desc')->where('employee_id', Auth::user()->id)->get();
        return view('livewire.user.work-report.user-view-work-report', compact('workreports'))->layout('layouts.user.base');
    }
}
