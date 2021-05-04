<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use App\Models\Notice;

class AddNoticeComponent extends Component
{

	public $title;
	public $date;
	public $description;

	public function updated($fields){
		$this->validateOnly($fields, [
			'title'=>'required',
			'date'=>'required',
			'description'=>'required'
		]);
	}

	public function noticeStore(){
		$this->validate([
			'title'=>'required',
			'date'=>'required',
			'description'=>'required'
		]);

		$notice = new Notice;
		$notice->title = $this->title;
		$notice->date = date('Y-m-d', strtotime($this->date));
		$notice->description = $this->description;
		$notice->save();
		session()->flash('success', 'Notice Added success');
		$this->title = '';
		$this->date = '';
		$this->description = '';
	}

    public function render()
    {
        return view('livewire.admin.notice.add-notice-component')->layout('layouts.admin.base');
    }
}
