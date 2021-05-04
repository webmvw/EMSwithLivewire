<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use App\Models\Notice;

class EditNoticeComponent extends Component
{
	public $notice_id;
	public $title;
	public $date;
	public $description;

	public function mount($id){
		$this->notice_id = $id;
		$notice = Notice::find($id);
		$this->title = $notice->title;
		$this->date = $notice->date;
		$this->description = $notice->description;
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'title'=>'required',
			'date'=>'required',
			'description'=>'required'
		]);
	}

	public function noticeUpdate(){
		$this->validate([
			'title'=>'required',
			'date'=>'required',
			'description'=>'required'
		]);

		$notice = Notice::find($this->notice_id);
		$notice->title = $this->title;
		$notice->date = $this->date;
		$notice->description = $this->description;
		$notice->save();
		session()->flash('success', 'Notice updated success');
	}

    public function render()
    {
        return view('livewire.admin.notice.edit-notice-component')->layout('layouts.admin.base');
    }
}
