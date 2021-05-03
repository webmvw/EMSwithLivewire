<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use App\Models\Notice;

class NoticeComponent extends Component
{
    public function render()
    {
    	$notices = Notice::orderBy('id', 'desc')->get();
        return view('livewire.admin.notice.notice-component', ['notices'=>$notices])->layout('layouts.admin.base');
    }
}
