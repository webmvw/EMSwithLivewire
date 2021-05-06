<?php

namespace App\Http\Livewire\User\Task;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class UserTaskListComponent extends Component
{
    public function render()
    {
    	$tasks = Task::where('status', 'running')->where('employee_id', Auth::user()->id)->get();
        return view('livewire.user.task.user-task-list-component', compact('tasks'))->layout('layouts.user.base');
    }
}
