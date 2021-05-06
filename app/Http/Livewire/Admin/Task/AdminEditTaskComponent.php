<?php

namespace App\Http\Livewire\Admin\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;

class AdminEditTaskComponent extends Component
{

	public $task_id;
	public $title;
	public $start_date;
	public $end_date;
	public $description;
	public $employee_id;
	public $status;

	public function mount($id){
		$this->task_id = $id;
		$task = Task::find($id);
		$this->title = $task->title;
		$this->start_date = $task->start_date;
		$this->end_date = $task->end_date;
		$this->description = $task->description;
		$this->employee_id = $task->employee_id;
		$this->status = $task->status;
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'title'=>'required',
			'start_date'=>'required',
			'end_date'=>'required',
			'employee_id'=>'required'
		]);
	}

	public function tastUpdate(){
		$this->validate([
			'title'=>'required',
			'start_date'=>'required',
			'end_date'=>'required',
			'employee_id'=>'required'
		]);

		$task = Task::find($this->task_id);
		$task->title = $this->title;
		$task->description = $this->description;
		$task->start_date = date('Y-m-d', strtotime($this->start_date));
		$task->end_date = date('Y-m-d', strtotime($this->end_date));
		$task->employee_id = $this->employee_id;
		$task->status = $this->status;
		$task->save();
		session()->flash('success', 'Task Updated Success!');
	}



    public function render()
    {
    	$employees = User::where('role_id', '2')->orderBy('id', 'desc')->get();
        return view('livewire.admin.task.admin-edit-task-component', compact('employees'))->layout('layouts.admin.base');
    }
}
