<?php

namespace App\Http\Livewire\User\Task;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class UserTaskListComponent extends Component
{

	public function taskAccept($id){
		$task = Task::find($id);
		$task->accept_status = 'accept';
		$task->save();
		session()->flash('success', 'Task Accepted Success');
	}

    public function render()
    {
    	$tasks = Task::where('status', 'running')->where('accept_status', null)->where('employee_id', Auth::user()->id)->get();
        return view('livewire.user.task.user-task-list-component', compact('tasks'))->layout('layouts.user.base');
    }
}
