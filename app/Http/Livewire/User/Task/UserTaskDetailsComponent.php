<?php

namespace App\Http\Livewire\User\Task;

use Livewire\Component;
use App\Models\Task;

class UserTaskDetailsComponent extends Component
{

	public $task_id;

	public function mount($id){
		$this->task_id = $id;
	}

    public function render()
    {
    	$task = Task::find($this->task_id);
        return view('livewire.user.task.user-task-details-component', compact('task'))->layout('layouts.user.base');
    }
}
