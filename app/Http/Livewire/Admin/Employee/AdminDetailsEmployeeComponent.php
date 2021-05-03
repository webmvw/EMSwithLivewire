<?php

namespace App\Http\Livewire\Admin\Employee;

use Livewire\Component;
use App\Models\User;
use App\Models\EmployeeSalaryLog;

class AdminDetailsEmployeeComponent extends Component
{

	public $employee_id;
	public function mount($id){
		$this->employee_id = $id;
	}

    public function render()
    {
    	$getEmployee = User::where('id', $this->employee_id)->where('role_id', '2')->first();
        return view('livewire.admin.employee.admin-details-employee-component', ['getEmployee'=>$getEmployee])->layout('layouts.admin.base');
    }
}
