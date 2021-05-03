<?php

namespace App\Http\Livewire\Admin\Employee;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use App\Models\Department;
use DB;

class AdminAddEmployeeComponent extends Component
{
	use WithFileUploads;

	public $name;
	public $email;
	public $password;
	public $phone;
	public $address;
	public $gender;
	public $religion;
	public $designation;
	public $department;
	public $joining_date;
	public $id_no;
	public $salary;
	public $dob;
	public $code;
	public $role_id;
	public $status;
	public $image;

	public function mount(){
		$this->role_id = 2;
		$this->status = 1;

		// start generate employee id number
        $employee = User::where('role_id', '2')->orderBy('id','desc')->first();
        if($employee == null){
            $firstReg = 0;
            $employeeId = $firstReg+1;
            if($employeeId<10){
                $id_no = '000'.$employeeId;
            }elseif($employeeId<100){
                $id_no = '00'.$employeeId;
            }elseif ($employeeId<1000) {
                $id_no = '0'.$employeeId;
            }
        }else{
            $employee = User::where('role_id','2')->orderBy('id','desc')->first()->id;
            $employeeId = $employee+1;
            if($employeeId<10){
                $id_no = '000'.$employeeId;
            }elseif($employeeId<100){
                $id_no = '00'.$employeeId;
            }elseif ($employeeId<1000) {
                $id_no = '0'.$employeeId;
            }
        }
        $rand_id = rand(0000, 9999);
        $this->id_no = $rand_id.$id_no;

        // code and password genereate
        $this->code = rand(0000, 9999);
        $this->password = bcrypt($this->code);
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'phone' => 'required|numeric',
			'address'=> 'required',
			'gender' => 'required',
			'religion'=>'required',
			'designation'=>'required',
			'department'=>'required',
			'joining_date'=>'required',
			'salary'=>'required|numeric',
			'dob'=>'required',
			'image'=>'image|max:1024|mimes:png,jpg,jpeg'
		]);
	}

	public function employeeRegister(){

		$this->validate([
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'phone' => 'required|numeric',
			'address'=> 'required',
			'gender' => 'required',
			'religion'=>'required',
			'designation'=>'required',
			'department'=>'required',
			'joining_date'=>'required',
			'salary'=>'required|numeric',
			'dob'=>'required',
			'image'=>'image|max:1024|mimes:png,jpg,jpeg'
		]);

		DB::transaction(function(){
		// start insert employee data in user model
	        $user = new User;
	        $user->name = $this->name;
	        $user->email = $this->email;
	        $user->password = $this->password;
	        $user->phone = $this->phone;
	        $user->address = $this->address;
	        $user->gender = $this->gender;
	        $user->religion = $this->religion;
	        $user->id_no = $this->id_no;
	        $user->dob = date('Y-m-d', strtotime($this->dob));
	        $user->code = $this->code;
	        $user->joining_date = date('Y-m-d', strtotime($this->joining_date));
	        $user->designation_id = $this->designation;
	        $user->department_id = $this->department;
	        $user->salary = $this->salary;
	        $user->role_id = $this->role_id;
	        $user->status = $this->status;
	        if($this->image != null){
	            $filename = time().'.'.$this->image->extension();
	            $this->image->storeAs('employee',$filename);
	            $user->image = $filename;
	        }
	        $user->save();
	        // end insert employee data in user model

	        // start insert employee data in EmployeeSalaryLog model
	        $employeeSalaryLog = new EmployeeSalaryLog;
	        $employeeSalaryLog->employee_id = $user->id;
	        $employeeSalaryLog->previous_salary = $this->salary;
	        $employeeSalaryLog->present_salary = $this->salary;
	        $employeeSalaryLog->increment_salary = '0';
	        $employeeSalaryLog->effected_date = date('Y-m-d', strtotime($this->joining_date));
	        $employeeSalaryLog->save();
	        // end insert employee data in EmployeeSalaryLog model
        });
        session()->flash('success', 'Employee has been added successfully!');    
	}


    public function render()
    {
    	$designations = Designation::all();
    	$departments = Department::all();
        return view('livewire.admin.employee.admin-add-employee-component', ['designations'=>$designations, 'departments'=>$departments])->layout('layouts.admin.base');
    }
}
