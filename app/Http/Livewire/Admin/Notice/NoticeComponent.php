<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use App\Models\Notice;

class NoticeComponent extends Component
{

	public $selected_item;

	public function selectItem($itemId, $action){
		$this->selected_item = $itemId;
		if($action == 'delete'){
			$this->dispatchBrowserEvent('openNoticeDeleteModel');
		}
	}

	public function deleteItem(){
		Notice::destroy($this->selected_item);
		session()->flash('delete_success', 'Notice has been deleted Success');
		$this->dispatchBrowserEvent('closeNoticeDeleteModel');
	}

    public function render()
    {
    	$notices = Notice::orderBy('id', 'desc')->get();
        return view('livewire.admin.notice.notice-component', ['notices'=>$notices])->layout('layouts.admin.base');
    }
}
