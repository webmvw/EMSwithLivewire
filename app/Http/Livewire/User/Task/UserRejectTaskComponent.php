<?php

namespace App\Http\Livewire\User\Task;

use Livewire\Component;
use App\Models\Task;

class UserRejectTaskComponent extends Component
{
	public $task_id;
	public $reject_reason;

	public function mount($id){
		$this->task_id = $id;
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'reject_reason'=>'required'
		]);
	}

	public function reject(){
		$this->validate([
			'reject_reason'=>'required'
		]);

		$task = Task::find($this->task_id);
		$task->accept_status = 'reject';
		$task->reject_reason = $this->reject_reason;
		$task->save();
		session()->flash('reject_success', 'Task Rejected Success');
	}

    public function render()
    {
        return view('livewire.user.task.user-reject-task-component')->layout('layouts.user.base');
    }
}
