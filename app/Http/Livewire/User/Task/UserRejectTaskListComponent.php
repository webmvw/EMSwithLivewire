<?php

namespace App\Http\Livewire\User\Task;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class UserRejectTaskListComponent extends Component
{
    public function render()
    {
    	$tasks = Task::where('accept_status', 'reject')->where('employee_id', Auth::user()->id)->get();
        return view('livewire.user.task.user-reject-task-list-component', compact('tasks'))->layout('layouts.user.base');
    }
}
