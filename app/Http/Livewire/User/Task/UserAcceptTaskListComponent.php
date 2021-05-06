<?php

namespace App\Http\Livewire\User\Task;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class UserAcceptTaskListComponent extends Component
{
    public function render()
    {
    	$tasks = Task::where('accept_status', 'accept')->where('employee_id', Auth::user()->id)->get();
        return view('livewire.user.task.user-accept-task-list-component', compact('tasks'))->layout('layouts.user.base');
    }
}
