<?php

namespace App\Http\Livewire\Admin\Employee;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Department;
use App\Models\Designation;
use DB;
use File;

class AdminEditEmployeeComponent extends Component
{
	use WithFileUploads;

	public $employee_id;
	public $name;
	public $email;
	public $phone;
	public $address;
	public $gender;
	public $religion;
	public $designation;
	public $department;
	public $joining_date;
	public $salary;
	public $dob;
	public $image;
	public $newImage;

	public function mount($id){
		$this->employee_id = $id;
		$user = User::find($id);
		$this->name = $user->name;
		$this->email = $user->email;
		$this->phone = $user->phone;
		$this->address = $user->address;
		$this->gender = $user->gender;
		$this->religion = $user->religion;
		$this->designation = $user->designation_id;
		$this->department = $user->department_id;
		$this->joining_date = $user->joining_date;
		$this->salary = $user->salary;
		$this->dob = $user->dob;
		$this->image = $user->image; 
	}


	public function updated($fields){
		$this->validateOnly($fields, [
			'name' => 'required',
			'email' => [
                'required',
                'email',
                 Rule::unique('users')->ignore($this->employee_id)
            ],
			'phone' => 'required|numeric',
			'address'=> 'required',
			'gender' => 'required',
			'religion'=>'required',
			'designation'=>'required',
			'department'=>'required',
			'joining_date'=>'required',
			'salary'=>'required|numeric',
			'dob'=>'required'
		]);
	}


	public function employeeUpdate(){

		$this->validate([
			'name' => 'required',
			'email' => [
                'required',
                'email',
                 Rule::unique('users')->ignore($this->employee_id)
            ],
			'phone' => 'required|numeric',
			'address'=> 'required',
			'gender' => 'required',
			'religion'=>'required',
			'designation'=>'required',
			'department'=>'required',
			'joining_date'=>'required',
			'salary'=>'required|numeric',
			'dob'=>'required'
		]);

		DB::transaction(function(){
            // start update teacher data in user model
            $user = User::find($this->employee_id);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->address = $this->address;
            $user->gender = $this->gender;
            $user->religion = $this->religion;
            $user->dob = date('Y-m-d', strtotime($this->dob));
            $user->joining_date = date('Y-m-d', strtotime($this->joining_date));
            $user->designation_id = $this->designation;
            $user->department_id = $this->department;
            $user->salary = $this->salary;
            if($this->newImage != null){
            	if(File::exists('assets/images/employee/'.$user->image)){
                    File::delete('assets/images/employee/'.$user->image);
                }
	            $filename = time().'.'.$this->newImage->extension();
	            $this->newImage->storeAs('employee',$filename);
	            $user->image = $filename;
	        }
            $user->save();
            // end update teacher data in user model

            // start update employee data in EmployeeSalaryLog model
            $employeeSalaryLog = EmployeeSalaryLog::where('employee_id', $this->employee_id)->first();
            $employeeSalaryLog->previous_salary = $this->salary;
            $employeeSalaryLog->present_salary = $this->salary;
            $employeeSalaryLog->effected_date = date('Y-m-d', strtotime($this->joining_date));
            $employeeSalaryLog->save();
            // end update employee data in EmployeeSalaryLog model
        });
        session()->flash('employee_updated', 'Employee updated success');
	}


    public function render()
    {
    	$designations = Designation::all();
    	$departments = Department::all();
        return view('livewire.admin.employee.admin-edit-employee-component', ['designations'=>$designations, 'departments'=>$departments])->layout('layouts.admin.base');
    }
}
