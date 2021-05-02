<?php

namespace App\Http\Livewire\Admin\Designation;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Designation;

class AdminDesignationComponent extends Component
{
	use WithPagination;

	public $name;
	public $selected_item;

	public function selectItem($itemId, $action){
		$this->selected_item = $itemId;
		if($action == 'delete'){
			$this->dispatchBrowserEvent('openDesignationDeleteModel');
		}
	}

	public function deleteItem(){
		Designation::destroy($this->selected_item);
		session()->flash('delete_success', 'Designation has been deleted Success');
		$this->dispatchBrowserEvent('closeDesignationDeleteModel');
	}

	public function updated($fields){
		$this->validateOnly($fields, [
			'name' => 'required|unique:designations'
		]);
	}

	public function designationStore(){

		$this->validate([
			'name' => 'required|unique:designations'
		]);

		$designation = new Designation;
		$designation->name = $this->name;
		$designation->save();
		session()->flash('success', 'Designation has been created success!');
		$this->name = '';
	}

    public function render()
    {
    	$designations = Designation::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.designation.admin-designation-component', ['designations'=>$designations])->layout('layouts.admin.base');
    }
}
