<?php

namespace App\Http\Livewire\User\WorkReport;

use Livewire\Component;
use App\Models\WorkReport;

class UserViewWorkReport extends Component
{
    public function render()
    {
    	$workreports = WorkReport::orderBy('id', 'desc')->get();
        return view('livewire.user.work-report.user-view-work-report', compact('workreports'))->layout('layouts.user.base');
    }
}
