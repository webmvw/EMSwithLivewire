<?php

namespace App\Http\Livewire\Admin\Employee;

use Livewire\Component;
use App\Models\User;
use App\Models\EmployeeSalaryLog;

class AdminDetailsEmployeeComponent extends Component
{

	public $employee_id;
	public $increment_salary;
	public $effected_date;


	public function mount($id){
		$this->employee_id = $id;
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'increment_salary'=>'required',
			'effected_date'=>'required'
		]);
	}


	public function salaryLogStore(){
		$this->validate([
			'increment_salary'=>'required',
			'effected_date'=>'required'
		]);

		$employee_salary = User::where('role_id', '2')->where('id', $this->employee_id)->first();
    	$previous_salary = $employee_salary->salary;
    	$present_salary = $previous_salary+$this->increment_salary;

    	// start update employee data in EmployeeSalaryLog model
        $employeeSalaryLog = new EmployeeSalaryLog;
        $employeeSalaryLog->employee_id = $this->employee_id;
        $employeeSalaryLog->previous_salary = $previous_salary;
        $employeeSalaryLog->present_salary = $present_salary;
        $employeeSalaryLog->increment_salary = $this->increment_salary;
        $employeeSalaryLog->effected_date = $this->effected_date;
        $employeeSalaryLog->save();
        // end update employee data in EmployeeSalaryLog model

        // update employee salary
        $employee = User::find($this->employee_id);
        $employee->salary = $present_salary;
        $employee->save();
        session()->flash('increment_success', 'Salary increment success');
        $this->increment_salary = '';
        $this->effected_date = '';
	}



    public function render()
    {
    	$getEmployee = User::where('id', $this->employee_id)->where('role_id', '2')->first();
        return view('livewire.admin.employee.admin-details-employee-component', ['getEmployee'=>$getEmployee])->layout('layouts.admin.base');
    }
}
