<?php

namespace App\Http\Livewire\Admin\Department;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Department;

class AdminDepartmentComponent extends Component
{
	use WithPagination;

	public $name;
	public $selected_item;

	public function selectItem($itemId, $action){
		$this->selected_item = $itemId;
		if($action == 'delete'){
			$this->dispatchBrowserEvent('openDepartmentDeleteModel');
		}
	}

	public function deleteItem(){
		Department::destroy($this->selected_item);
		session()->flash('delete_success', 'Department has been deleted Success');
		$this->dispatchBrowserEvent('closeDepartmentDeleteModel');
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'name' => 'required|unique:departments'
		]);
	}

	public function departmentStore(){

		$this->validate([
			'name' => 'required|unique:departments'
		]);

		$department = new Department;
		$department->name = $this->name;
		$department->save();
		session()->flash('success', 'Department has been created success!');
		$this->name = '';
	}

    public function render()
    {
    	$departments = Department::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.department.admin-department-component', ['departments'=> $departments])->layout('layouts.admin.base');
    }
}
