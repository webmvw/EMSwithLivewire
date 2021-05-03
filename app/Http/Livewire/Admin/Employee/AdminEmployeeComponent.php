<?php

namespace App\Http\Livewire\Admin\Employee;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class AdminEmployeeComponent extends Component
{
	use WithPagination;
    public function render()
    {
    	$employees = User::where('role_id', '2')->where('status', '1')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.employee.admin-employee-component', ['employees'=>$employees])->layout('layouts.admin.base');
    }
}
