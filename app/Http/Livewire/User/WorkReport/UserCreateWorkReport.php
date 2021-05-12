<?php

namespace App\Http\Livewire\User\WorkReport;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkReport;

class UserCreateWorkReport extends Component
{

	public $employee_id;
	public $date;
	public $work_description;
	public $target;
	public $achievement;
	public $work_result;
	public $reflection_of_work;
	public $problems_while_working;
	public $remarks;


	public function mount(){
		$this->employee_id = Auth::user()->id;
	}


	public function updated($fields){
		$this->validateOnly($fields, [
			'date'=>'required',
			'work_description'=>'required',
			'target'=>'required',
			'achievement'=>'required',
			'work_result'=>'required',
			'reflection_of_work'=>'required',
			'problems_while_working'=>'required',
			'remarks'=>'required'
		]);
	}


	public function workReportStore(){
		$this->validate([
			'date'=>'required',
			'work_description'=>'required',
			'target'=>'required',
			'achievement'=>'required',
			'work_result'=>'required',
			'reflection_of_work'=>'required',
			'problems_while_working'=>'required',
			'remarks'=>'required'
		]);

		$workreport = new WorkReport;
		$workreport->date = date('Y-m-d', strtotime($this->date));
		$workreport->employee_id = $this->employee_id;
		$workreport->work_description = $this->work_description;
		$workreport->target = $this->target;
		$workreport->achievement = $this->achievement;
		$workreport->work_result = $this->work_result;
		$workreport->reflection_of_work = $this->reflection_of_work;
		$workreport->problems_while_working = $this->problems_while_working;
		$workreport->remarks = $this->remarks;
		$workreport->save();
		session()->flash('success', 'Work Report Added success');
		$this->date = '';
		$this->work_description = '';
		$this->target = '';
		$this->achievement = '';
		$this->work_result = '';
		$this->reflection_of_work = '';
		$this->problems_while_working = '';
		$this->remarks = '';
	}


    public function render()
    {
        return view('livewire.user.work-report.user-create-work-report')->layout('layouts.user.base');
    }
}
