<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use App\Models\Notice;

class DetailsNoticeComponent extends Component
{

	public $notice_id;

	public function mount($id){
		$this->notice_id = $id;
	}

    public function render()
    {
    	$notice = Notice::find($this->notice_id);
        return view('livewire.admin.notice.details-notice-component', compact('notice'))->layout('layouts.admin.base');
    }
}
