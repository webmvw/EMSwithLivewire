<?php

namespace App\Http\Livewire\Admin\Task;

use Livewire\Component;
use App\Models\Task;

class AdminDetailsTaskComponent extends Component
{

	public $task_id;

	public function mount($id){
		$this->task_id = $id;
	}

    public function render()
    {
    	$task = Task::find($this->task_id);
        return view('livewire.admin.task.admin-details-task-component', compact('task'))->layout('layouts.admin.base');
    }
}
