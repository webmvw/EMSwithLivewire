<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Attendance;

class UserDashboardComponent extends Component
{

	public $employee_id;
	public $date;
	public $attend_status;

	public function mount(){
		$this->date = Carbon::now()->setTimezone('Asia/Dhaka')->format('Y-m-d');
		$this->employee_id = Auth::user()->id;
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'employee_id'=>'required',
			'date'=>'required',
			'attend_status'=>'required'
		]);
	}

	public function attendanceStore(){
		$this->validate([
			'employee_id'=>'required',
			'date'=>'required',
			'attend_status'=>'required'
		]);

		$attendance = new Attendance;
		$attendance->employee_id = $this->employee_id;
		$attendance->date = date('Y-m-d', strtotime($this->date));
		$attendance->attend_status = $this->attend_status;
		$attendance->save();
	}

    public function render()
    {
        return view('livewire.user.user-dashboard-component')->layout('layouts.user.base');
    }
}
