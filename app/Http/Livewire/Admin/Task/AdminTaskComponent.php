<?php

namespace App\Http\Livewire\Admin\Task;

use Livewire\Component;
use App\Models\Task;

class AdminTaskComponent extends Component
{
    public function render()
    {
    	$tasks = Task::orderBy('id', 'desc')->get();
        return view('livewire.admin.task.admin-task-component', compact('tasks'))->layout('layouts.admin.base');
    }
}
