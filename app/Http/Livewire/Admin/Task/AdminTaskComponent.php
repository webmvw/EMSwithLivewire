<?php

namespace App\Http\Livewire\Admin\Task;

use Livewire\Component;
use App\Models\Task;

class AdminTaskComponent extends Component
{
	public $selected_item;

	public function selectItem($itemId, $action){
		$this->selected_item = $itemId;
		if($action == 'delete'){
			$this->dispatchBrowserEvent('openTaskDeleteModel');
		}
	}

	public function deleteItem(){
		Task::destroy($this->selected_item);
		session()->flash('delete_success', 'Task has been deleted Success');
		$this->dispatchBrowserEvent('closeTaskDeleteModel');
	}

    public function render()
    {
    	$tasks = Task::orderBy('id', 'desc')->get();
        return view('livewire.admin.task.admin-task-component', compact('tasks'))->layout('layouts.admin.base');
    }
}
