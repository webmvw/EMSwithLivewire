<?php

namespace App\Http\Livewire\Admin\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;

class AdminAddTaskComponent extends Component
{

	public $title;
	public $start_date;
	public $end_date;
	public $description;
	public $employee_id;
	public $status;

	public function mount(){
		$this->status = 'running';
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'title'=>'required',
			'start_date'=>'required',
			'end_date'=>'required',
			'employee_id'=>'required'
		]);
	}

	public function tastStore(){
		$this->validate([
			'title'=>'required',
			'start_date'=>'required',
			'end_date'=>'required',
			'employee_id'=>'required'
		]);

		$task = new Task;
		$task->title = $this->title;
		$task->description = $this->description;
		$task->start_date = date('Y-m-d', strtotime($this->start_date));
		$task->end_date = date('Y-m-d', strtotime($this->end_date));
		$task->employee_id = $this->employee_id;
		$task->status = $this->status;
		$task->save();
		session()->flash('success', 'Task Added Success!');
		$this->title = '';
		$this->description = '';
		$this->start_date = '';
		$this->end_date = '';
		$this->employee_id = '';
	}

    public function render()
    {
    	$employees = User::where('role_id', '2')->where('status', '1')->get();
        return view('livewire.admin.task.admin-add-task-component', compact('employees'))->layout('layouts.admin.base');
    }
}
